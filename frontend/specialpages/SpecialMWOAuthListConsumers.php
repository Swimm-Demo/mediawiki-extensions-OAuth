<?php

namespace MediaWiki\Extensions\OAuth;

/*
 (c) Aaron Schulz 2013, GPL

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License along
 with this program; if not, write to the Free Software Foundation, Inc.,
 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 http://www.gnu.org/copyleft/gpl.html
*/

/**
 * Special page for listing the queue of consumer requests and managing
 * their approval/rejection and also for listing approved/disabled consumers
 */
class SpecialMWOAuthListConsumers extends \SpecialPage {
	public function __construct() {
		parent::__construct( 'OAuthListConsumers' );
	}

	public function execute( $par ) {
		$this->setHeaders();

		// Format is Special:OAuthListConsumers[/list|/view/[<consumer key>]]
		$navigation = explode( '/', $par );
		$type = isset( $navigation[0] ) ? $navigation[0] : null;
		$consumerKey = isset( $navigation[1] ) ? $navigation[1] : null;

		$this->showConsumerListForm();

		switch ( $type ) {
		case 'view':
			$this->showConsumerInfo( $consumerKey );
			break;
		default:
			$this->showConsumerList();
			break;
		}

		$this->getOutput()->addModuleStyles( 'ext.MWOAuth.BasicStyles' );
	}

	/**
	 * Show the form to approve/reject/disable/re-enable consumers
	 *
	 * @param string $consumerKey
	 * @throws \PermissionsError
	 */
	protected function showConsumerInfo( $consumerKey ) {
		$user = $this->getUser();
		$out = $this->getOutput();

		if ( !$consumerKey ) {
			$out->addWikiMsg( 'mwoauth-missing-consumer-key' );
		}

		$dbr = MWOAuthUtils::getCentralDB( DB_SLAVE );
		$cmr = MWOAuthDAOAccessControl::wrap(
			MWOAuthConsumer::newFromKey( $dbr, $consumerKey ), $this->getContext() );
		if ( !$cmr ) {
			$out->addWikiMsg( 'mwoauth-invalid-consumer-key' );
			return;
		} elseif ( $cmr->get( 'deleted' ) && !$user->isAllowed( 'mwoauthviewsuppressed' ) ) {
			throw new \PermissionsError( 'mwoauthviewsuppressed' );
		}

		$grants = $cmr->get( 'grants' );
		if ( $grants === array( 'mwoauth-authonly' ) || $grants === array( 'mwoauth-authonlyprivate' ) ) {
			$s = $this->msg( 'grant-' . $grants[0] )->text() . "\n";
		} else {
			$s = \MWGrants::getGrantsWikiText( $grants, $this->getLanguage() );
			if ( $s == '' ) {
				$s = $this->msg( 'mwoauthlistconsumers-basicgrantsonly' )->text();
			} else {
				$s .= "\n";
			}
		}

		$stageKey = MWOAuthConsumer::$stageNames[$cmr->get( 'stage' )];
		$data = array(
			'mwoauthlistconsumers-name' => htmlspecialchars(
				$cmr->get( 'name' )
			),
			'mwoauthlistconsumers-version' => htmlspecialchars(
				$cmr->get( 'version' )
			),
			'mwoauthlistconsumers-user' => htmlspecialchars(
				$cmr->get( 'userId', 'MediaWiki\Extensions\OAuth\MWOAuthUtils::getCentralUserNameFromId' )
			),
			'mwoauthlistconsumers-status' => htmlspecialchars(
				wfMessage( "mwoauthlistconsumers-status-$stageKey" )
			),
			'mwoauthlistconsumers-description' => htmlspecialchars(
				$cmr->get( 'description' )
			),
			'mwoauthlistconsumers-wiki' => htmlspecialchars(
				$cmr->get( 'wiki', 'MediaWiki\Extensions\OAuth\MWOAuthUtils::getWikiIdName' )
			),
			'mwoauthlistconsumers-callbackurl' => htmlspecialchars(
				$cmr->get( 'callbackUrl' )
			),
			'mwoauthlistconsumers-callbackisprefix' => htmlspecialchars(
				$cmr->get( 'callbackIsPrefix' )
			),
			'mwoauthlistconsumers-grants' => $out->parseInline( $s ),
		);

		$r = '';
		foreach ( $data as $msg => $encValue ) {
			$r .= '<p><b>' . $this->msg( $msg )->escaped() . '</b>: ' . $encValue . '</p>';
		}

		$out->addHtml( $r );

		if ( MWOAuthUtils::isCentralWiki() ) {
			// Show all of the status updates
			$logPage = new \LogPage( 'mwoauthconsumer' );
			$out->addHTML( \Xml::element( 'h2', null, $logPage->getName()->text() ) );
			\LogEventsList::showLogExtract( $out, 'mwoauthconsumer', '', '',
				array(
					'conds' => array(
					'ls_field' => 'OAuthConsumer', 'ls_value' => $cmr->get( 'consumerKey' ) ),
					'flags' => \LogEventsList::NO_EXTRA_USER_LINKS
				)
			);
		}
	}

	/**
	 * Show a form for the paged list of consumers
	 */
	protected function showConsumerListForm() {
		$form = new \HTMLForm(
			array(
				'name' => array(
					'name'     => 'name',
					'type'     => 'text',
					'label-message' => 'mwoauth-consumer-name',
					'required' => false,
				),
				'publisher' => array(
					'name'     => 'publisher',
					'type'     => 'text',
					'label-message' => 'mwoauth-consumer-user',
					'required' => false
				),
				'stage' => array(
					'name'     => 'stage',
					'type'     => 'select',
					'label-message' => 'mwoauth-consumer-stage',
					'options'  => array(
						wfMessage( 'mwoauth-consumer-stage-any' )->escaped() => -1,
						wfMessage( 'mwoauth-consumer-stage-proposed' )->escaped()
							=> MWOAuthConsumer::STAGE_PROPOSED,
						wfMessage( 'mwoauth-consumer-stage-approved' )->escaped()
							=> MWOAuthConsumer::STAGE_APPROVED,
						wfMessage( 'mwoauth-consumer-stage-rejected' )->escaped()
							=> MWOAuthConsumer::STAGE_REJECTED,
						wfMessage( 'mwoauth-consumer-stage-disabled' )->escaped()
							=> MWOAuthConsumer::STAGE_DISABLED,
						wfMessage( 'mwoauth-consumer-stage-expired' )->escaped()
							=> MWOAuthConsumer::STAGE_EXPIRED
					),
					'default'  => MWOAuthConsumer::STAGE_APPROVED,
					'required' => false
				)
			),
			$this->getContext()
		);
		$form->setAction( $this->getPageTitle()->getFullUrl() ); // always go back to listings
		$form->setSubmitCallback( function() { return false; } );
		$form->setMethod( 'get' );
		$form->setSubmitTextMsg( 'go' );
		$form->setWrapperLegendMsg( 'mwoauthlistconsumers-legend' );
		$form->show();
	}

	/**
	 * Show a paged list of consumers with links to details
	 */
	protected function showConsumerList() {
		$request = $this->getRequest();

		$name = $request->getVal( 'name', '' );
		$stage = $request->getInt( 'stage', MWOAuthConsumer::STAGE_APPROVED );
		if ( $request->getVal( 'publisher', '' ) !== '' ) {
			$centralId = MWOAuthUtils::getCentralIdFromUserName( $request->getVal( 'publisher' ) );
		} else {
			$centralId = null;
		}

		$pager = new MWOAuthListConsumersPager( $this, array(), $name, $centralId, $stage );
		if ( $pager->getNumRows() ) {
			$this->getOutput()->addHTML( $pager->getNavigationBar() );
			$this->getOutput()->addHTML( $pager->getBody() );
			$this->getOutput()->addHTML( $pager->getNavigationBar() );
		} else {
			// Messages: mwoauthlistconsumers-none-proposed, mwoauthlistconsumers-none-rejected,
			// mwoauthlistconsumers-none-expired, mwoauthlistconsumers-none-approved,
			// mwoauthlistconsumers-none-disabled
			$this->getOutput()->addWikiMsg( "mwoauthlistconsumers-none" );
		}
		# Every 30th view, prune old deleted items
		if ( 0 == mt_rand( 0, 29 ) ) {
			MWOAuthUtils::runAutoMaintenance( MWOAuthUtils::getCentralDB( DB_MASTER ) );
		}
	}

	/**
	 * @param \DBConnRef $db
	 * @param sdtclass $row
	 * @return string
	 */
	public function formatRow( \DBConnRef $db, $row ) {
		$cmr = MWOAuthDAOAccessControl::wrap(
			MWOAuthConsumer::newFromRow( $db, $row ), $this->getContext() );

		$cmrKey = $cmr->get( 'consumerKey' );
		$stageKey = MWOAuthConsumer::$stageNames[$cmr->get( 'stage' )];

		$links = array();
		$links[] = \Linker::linkKnown(
			$this->getPageTitle( "view/{$cmrKey}" ),
			$this->msg( 'mwoauthlistconsumers-view' )->escaped(),
			array(),
			$this->getRequest()->getValues( 'name', 'publisher', 'stage' ) // stick
		);
		if ( $this->getUser()->isAllowed( 'mwoauthmanageconsumer' ) ) {
			$links[] = \Linker::linkKnown(
				\SpecialPage::getTitleFor( 'OAuthManageConsumers', "{$stageKey}/{$cmrKey}" ),
				$this->msg( 'mwoauthmanageconsumers-review' )->escaped()
			);
		}
		$links = $this->getLanguage()->pipeList( $links );

		$encStageKey = htmlspecialchars( $stageKey ); // sanity
		$r = "<li class=\"mw-mwoauthlistconsumers-{$encStageKey}\">";

		// We don't have $this in the anonymous function here within PHP 5.3.
		$out = $this;
		$name = $cmr->get( 'name', function( $s ) use ( $cmr, $out ) {
			return $s . ' ' . $out->msg( 'brackets' )->rawParams( $cmr->get( 'version' ) )->plain(); } );
		$r .= "<strong>" . htmlspecialchars( $name ) . '</strong> ' . $this->msg( 'parentheses' )
				->rawParams( "<strong>{$links}</strong>" )->plain();

		$lang = $this->getLanguage();
		$data = array(
			'mwoauthlistconsumers-user' => htmlspecialchars(
				$cmr->get( 'userId', 'MediaWiki\Extensions\OAuth\MWOAuthUtils::getCentralUserNameFromId' )
			),
			'mwoauthlistconsumers-description' => htmlspecialchars(
				$cmr->get( 'description', function( $s ) use ( $lang ) {
					return $lang->truncate( $s, 10024 ); } )
			),
			'mwoauthlistconsumers-wiki' => htmlspecialchars(
				$cmr->get( 'wiki', 'MediaWiki\Extensions\OAuth\MWOAuthUtils::getWikiIdName' )
			),
			'mwoauthlistconsumers-status' => htmlspecialchars(
				wfMessage( "mwoauthlistconsumers-status-$stageKey" )
			)
		);

		foreach ( $data as $msg => $encValue ) {
			$r .= '<p>' . $this->msg( $msg )->escaped() . ': ' . $encValue . '</p>';
		}

		$r .= '</li>';

		return $r;
	}

	protected function getGroupName() {
		return 'users';
	}
}

/**
 * Query to list out consumers
 *
 * @TODO: use UserCache
 */
class MWOAuthListConsumersPager extends \AlphabeticPager {
	public $mForm, $mConds;

	function __construct( $form, $conds, $name, $centralUserID, $stage ) {
		$this->mForm = $form;
		$this->mConds = $conds;

		$this->mIndexField = null;
		if ( $name !== '' ) {
			$this->mConds['oarc_name'] = $name;
			$this->mIndexField = 'oarc_id';
		}
		if ( $centralUserID !== null ) {
			$this->mConds['oarc_user_id'] = $centralUserID;
			$this->mIndexField = 'oarc_id';
		}
		if ( $stage >= 0 ) {
			$this->mConds['oarc_stage'] = $stage;
			if ( !$this->mIndexField ) {
				$this->mIndexField = 'oarc_stage_timestamp';
			}
		}
		if ( !$this->mIndexField ) {
			$this->mIndexField = 'oarc_id';
		}

		if ( !$this->getUser()->isAllowed( 'mwoauthviewsuppressed' ) ) {
			$this->mConds['oarc_deleted'] = 0;
		}

		$this->mDb = MWOAuthUtils::getCentralDB( DB_SLAVE );
		parent::__construct();

		# Treat 20 as the default limit, since each entry takes up 5 rows.
		$urlLimit = $this->mRequest->getInt( 'limit' );
		$this->mLimit = $urlLimit ? $urlLimit : 20;
	}

	/**
	 * @return \Title
	 */
	function getTitle() {
		return $this->mForm->getFullTitle();
	}

	/**
	 * @param $row
	 * @return string
	 */
	function formatRow( $row ) {
		return $this->mForm->formatRow( $this->mDb, $row );
	}

	/**
	 * @return string
	 */
	function getStartBody() {
		if ( $this->getNumRows() ) {
			return '<ul>';
		} else {
			return '';
		}
	}

	/**
	 * @return string
	 */
	function getEndBody() {
		if ( $this->getNumRows() ) {
			return '</ul>';
		} else {
			return '';
		}
	}

	/**
	 * @return array
	 */
	function getQueryInfo() {
		return array(
			'tables' => array( 'oauth_registered_consumer' ),
			'fields' => array( '*' ),
			'conds'  => $this->mConds
		);
	}

	/**
	 * @return string
	 */
	function getIndexField() {
		return $this->mIndexField;
	}
}
