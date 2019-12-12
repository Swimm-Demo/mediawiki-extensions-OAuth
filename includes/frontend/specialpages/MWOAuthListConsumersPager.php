<?php

namespace MediaWiki\Extensions\OAuth;

/**
 * (c) Aaron Schulz 2013, GPL
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Query to list out consumers
 *
 * @TODO: use UserCache
 */
class MWOAuthListConsumersPager extends \AlphabeticPager {
	/** @var SpecialMWOAuthListConsumers */
	public $mForm;

	/** @var array */
	public $mConds;

	public function __construct( $form, $conds, $name, $centralUserID, $stage ) {
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

		$this->mDb = MWOAuthUtils::getCentralDB( DB_REPLICA );
		parent::__construct();

		# Treat 20 as the default limit, since each entry takes up 5 rows.
		$urlLimit = $this->mRequest->getInt( 'limit' );
		$this->mLimit = $urlLimit ?: 20;
	}

	/**
	 * @return \Title
	 */
	public function getTitle() {
		return $this->mForm->getFullTitle();
	}

	/**
	 * @param \stdClass $row
	 * @return string
	 */
	public function formatRow( $row ) {
		return $this->mForm->formatRow( $this->mDb, $row );
	}

	/**
	 * @return string
	 */
	public function getStartBody() {
		if ( $this->getNumRows() ) {
			return '<ul>';
		} else {
			return '';
		}
	}

	/**
	 * @return string
	 */
	public function getEndBody() {
		if ( $this->getNumRows() ) {
			return '</ul>';
		} else {
			return '';
		}
	}

	/**
	 * @return array
	 */
	public function getQueryInfo() {
		return [
			'tables' => [ 'oauth_registered_consumer' ],
			'fields' => [ '*' ],
			'conds'  => $this->mConds
		];
	}

	/**
	 * @return string
	 */
	public function getIndexField() {
		return $this->mIndexField;
	}
}
