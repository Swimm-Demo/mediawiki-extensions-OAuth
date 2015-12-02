<?php

namespace MediaWiki\Extensions\OAuth;

use Hooks;
use MWException;

/**
 * Static utility functions for OAuth
 *
 * @file
 * @ingroup OAuth
 */
class MWOAuthUtils {
	/**
	 * @return bool
	 */
	public static function isCentralWiki() {
		global $wgMWOAuthCentralWiki;

		return ( wfWikiId() === $wgMWOAuthCentralWiki );
	}

	/**
	 * @param integer $index DB_MASTER/DB_SLAVE
	 * @return \DBConnRef
	 */
	public static function getCentralDB( $index ) {
		global $wgMWOAuthCentralWiki, $wgMWOAuthReadOnly;

		$db = wfGetLB( $wgMWOAuthCentralWiki )->getConnectionRef(
			$index, array(), $wgMWOAuthCentralWiki );
		$db->daoReadOnly = $wgMWOAuthReadOnly;
		return $db;
	}

	/**
	 * @param \DBConnRef $db
	 * @return array
	 */
	public static function getConsumerStateCounts( \DBConnRef $db ) {
		$res = $db->select( 'oauth_registered_consumer',
			array( 'oarc_stage', 'count' => 'COUNT(*)' ),
			array(),
			__METHOD__,
			array( 'GROUP BY' => 'oarc_stage' )
		);
		$table = array(
			MWOAuthConsumer::STAGE_APPROVED => 0,
			MWOAuthConsumer::STAGE_DISABLED => 0,
			MWOAuthConsumer::STAGE_EXPIRED  => 0,
			MWOAuthConsumer::STAGE_PROPOSED => 0,
			MWOAuthConsumer::STAGE_REJECTED => 0,
		);
		foreach ( $res as $row ) {
			$table[(int)$row->oarc_stage] = (int)$row->count;
		}
		return $table;
	}

	/**
	 * Sanitize the output of apache_request_headers because
	 * we always want the keys to be Cased-Like-This and arh()
	 * returns the headers in the same case as they are in the
	 * request
	 * @return Array of apache headers and their values
	 */
	public static function getHeaders() {
		$request = \RequestContext::getMain()->getRequest();
		$headers = $request->getAllHeaders();

		$out = array();
		foreach ($headers AS $key => $value) {
			$key = str_replace(
				" ",
				"-",
				ucwords( strtolower( str_replace( "-", " ", $key) ) )
			);
			$out[$key] = $value;
		}
		return $out;
	}

	/**
	 * Test this request for an OAuth Authorization header
	 * @param \WebRequest $request the MediaWiki request
	 * @return Boolean (true if a header was found)
	 */
	public static function hasOAuthHeaders( \WebRequest $request ) {
		$header = $request->getHeader( 'Authorization' );
		if ( $header !== false && substr( $header, 0, 6 ) == 'OAuth ' ) {
			return true;
		}
		return false;
	}

	/**
	 * Make a cache key for the given arguments, that (hopefully) won't clash with
	 * anything else in your cache
	 */
	public static function getCacheKey( /* varags */ ) {
		global $wgMWOAuthCentralWiki;

		$args = func_get_args();
		return "OAUTH:$wgMWOAuthCentralWiki:" . implode( ':', $args );
	}


	/**
	 * @param \DBConnRef $dbw
	 * @return void
	 */
	public static function runAutoMaintenance( \DBConnRef $dbw ) {
		global $wgMWOAuthRequestExpirationAge;

		if ( $wgMWOAuthRequestExpirationAge <= 0 ) {
			return;
		}

		$cutoff = $dbw->timestamp( time() - $wgMWOAuthRequestExpirationAge );
		$dbw->onTransactionIdle( function() use ( $dbw, $cutoff ) {
			$dbw->update( 'oauth_registered_consumer',
				array( 'oarc_stage' => MWOAuthConsumer::STAGE_EXPIRED,
					'oarc_stage_timestamp' => $dbw->timestamp() ),
				array( 'oarc_stage' => MWOAuthConsumer::STAGE_PROPOSED,
					'oarc_stage_timestamp < ' . $dbw->addQuotes( $cutoff ) ),
				__METHOD__
			);
		} );
	}

	/**
	 * @return array
	 */
	public static function getValidGrants() {
		global $wgMWOAuthGrantPermissions;

		return array_keys( $wgMWOAuthGrantPermissions );
	}

	/**
	 * @return array
	 */
	public static function getRightsByGrant() {
		global $wgMWOAuthGrantPermissions;

		$res = array();
		foreach ( $wgMWOAuthGrantPermissions as $grant => $rights ) {
			$res[$grant] = array_keys( array_filter( $rights ) );
		}
		return $res;
	}

	/**
	 * @param string $grant
	 * @return string Grant description
	 */
	public static function grantName( $grant ) {
		// Give grep a chance to find the usages:
		// mwoauth-grant-blockusers, mwoauth-grant-createeditmovepage, mwoauth-grant-delete,
		// mwoauth-grant-editinterface, mwoauth-grant-editmycssjs, mwoauth-grant-editmywatchlist,
		// mwoauth-grant-editpage, mwoauth-grant-editprotected, mwoauth-grant-highvolume,
		// mwoauth-grant-oversight, mwoauth-grant-patrol, mwoauth-grant-protect, mwoauth-grant-rollback,
		// mwoauth-grant-sendemail, mwoauth-grant-uploadeditmovefile, mwoauth-grant-uploadfile,
		// mwoauth-grant-useoauth, mwoauth-grant-viewdeleted, mwoauth-grant-viewmywatchlist,
		// mwoauth-grant-createaccount
		$msg = wfMessage( "mwoauth-grant-$grant" );
		$msg = $msg->exists() ? $msg : wfMessage( "mwoauth-grant-generic", $grant );
		return $msg->text();
	}

	/**
	 * @param array $grants
	 * @return array Array of corresponding grant descriptions
	 */
	public static function grantNames( array $grants ) {
		return array_map( 'MediaWiki\Extensions\OAuth\MWOAuthUtils::grantName', $grants );
	}

	/**
	 * @param array|string $grants
	 * @return array
	 */
	public static function getGrantRights( $grants ) {
		global $wgMWOAuthGrantPermissions;

		$rights = array();
		foreach ( (array)$grants as $grant ) {
			if ( isset( $wgMWOAuthGrantPermissions[$grant] ) ) {
				$rights = array_merge( $rights,
					array_keys( array_filter( $wgMWOAuthGrantPermissions[$grant] ) ) );
			}
		}
		return array_unique( $rights );
	}

	/**
	 * @param array $grants
	 * @return bool
	 */
	public static function grantsAreValid( array $grants ) {
		return array_diff( $grants, self::getValidGrants() ) === array();
	}

	/**
	 * @param Array $grants
	 * @return Array Map of (group => (grant list))
	 */
	public static function getGrantGroups( $grantsFilter = null ) {
		global $wgMWOAuthGrantPermissions, $wgMWOAuthGrantPermissionGroups;

		if ( is_array( $grantsFilter ) ) {
			$grantsFilter = array_flip( $grantsFilter );
		}

		$groups = array();
		foreach ( $wgMWOAuthGrantPermissions as $grant => $rights ) {
			if ( $grantsFilter !== null && !isset( $grantsFilter[$grant] ) ) {
				continue;
			}
			if ( isset( $wgMWOAuthGrantPermissionGroups[$grant] ) ) {
				$groups[$wgMWOAuthGrantPermissionGroups[$grant]][] = $grant;
			} else {
				$groups['other'][] = $grant;
			}
		}

		return $groups;
	}

	/**
	 * Get the list of grants that are hidden and should always be granted
	 *
	 * @return array
	 */
	public static function getHiddenGrants() {
		global $wgMWOAuthGrantPermissionGroups;

		$grants = array();
		foreach ( $wgMWOAuthGrantPermissionGroups as $grant => $group ) {
			if ( $group === 'hidden' ) {
				$grants[] = $grant;
			}
		}
		return $grants;
	}

	/**
	 * @param array $restrictions
	 * @return bool
	 */
	public static function restrictionsAreValid( array $restrictions ) {
		static $validKeys = array( 'IPAddresses' );
		static $neededKeys = array( 'IPAddresses' );

		$keys = array_keys( $restrictions );
		if ( array_diff( $keys, $validKeys ) ) {
			return false;
		} elseif ( array_diff( $neededKeys, $keys ) ) {
			return false;
		}
		foreach ( $restrictions['IPAddresses'] as $ip ) {
			if ( !\IP::isIPAddress( $ip ) ) {
				return false;
			}
		}

		return true;
	}

	/**
	 * Get the pretty name of an OAuth wiki ID restriction value
	 *
	 * @param string $wikiId A wiki ID or '*'
	 * @return string
	 */
	public static function getWikiIdName( $wikiId ) {
		if ( $wikiId === '*' ) {
			return wfMessage( 'mwoauth-consumer-allwikis' )->text();
		} else {
			$host = \WikiMap::getWikiName( $wikiId );
			if ( strpos( $host, '.' ) ) {
				return $host; // e.g. "en.wikipedia.org"
			} else {
				return $wikiId;
			}
		}
	}

	/**
	 * Get the pretty names of all local wikis
	 *
	 * @return array associative array of local wiki names indexed by wiki ID
	 */
	public static function getAllWikiNames() {
		global $wgConf;
		$wikiNames = array();
		foreach ( $wgConf->getLocalDatabases() as $dbname ) {
			$name = self::getWikiIdName( $dbname );
			if ( $name != $dbname ) {
				$wikiNames[$dbname] = $name;
			}
		}
		return $wikiNames;
	}

	/**
	 * Quickly get a new server with all the default configurations
	 *
	 * @return MWOAuthServer with default configurations
	 */
	public static function newMWOAuthServer() {
		global $wgMemc;

		$dbr = MWOAuthUtils::getCentralDB( DB_SLAVE );
		$store = new MWOAuthDataStore( $dbr, $wgMemc );
		$server = new MWOAuthServer( $store );
		$server->add_signature_method( new OAuthSignatureMethod_HMAC_SHA1() );
		$server->add_signature_method( new MWOAuthSignatureMethod_RSA_SHA1( $store ) );

		return $server;
	}

	/**
	 * Given a central wiki user ID, get a central user name
	 *
	 * @param integer $userId
	 * @param bool|\User $audience show hidden names based on this user, or false for public
	 * @throws \MWException
	 * @return string|bool User name, false if not found, empty string if name is hidden
	 */
	public static function getCentralUserNameFromId( $userId, $audience = false ) {
		global $wgMWOAuthCentralWiki, $wgMWOAuthSharedUserIDs, $wgMWOAuthSharedUserSource;

		if ( $wgMWOAuthSharedUserIDs ) { // global ID required via hook
			$lookup = null;
			if ( class_exists( 'CentralIdLookup' ) ) {
				$lookup = \CentralIdLookup::factory( $wgMWOAuthSharedUserSource );
			}

			if ( $lookup ) {
				$name = $lookup->nameFromCentralId( $userId, $audience ?: \CentralIdLookup::AUDIENCE_PUBLIC );
				if ( $name === null ) {
					$name = false;
				}
			} else {
				if ( !\Hooks::isRegistered( 'OAuthGetUserNamesFromCentralIds' ) ) {
					throw new \MWException( "No handler for 'OAuthGetUserNamesFromCentralIds' hook" );
				}
				$namesById = array( $userId => null );
				Hooks::run( 'OAuthGetUserNamesFromCentralIds',
					array( $wgMWOAuthCentralWiki,
						&$namesById,
						$audience,
						$wgMWOAuthSharedUserSource
					)
				);
				$name = $namesById[$userId];
			}
			if ( $name === null ) {
				// The extension didn't handle the id
				throw new \MWException( 'Could not lookup name from ID via hook.' );
			}
		} else {
			$name = '';
			$user = \User::newFromId( $userId );
			if ( !$user->isHidden()
				|| ( $audience instanceof \User && $audience->isAllowed( 'hideuser' ) )
			) {
				$name = $user->getName();
			}
		}

		return $name;
	}

	/**
	 * Given a central wiki user ID, get a local User object
	 *
	 * @param integer $userId
	 * @throws \MWException
	 * @return \User|bool User or false if not found
	 */
	public static function getLocalUserFromCentralId( $userId ) {
		global $wgMWOAuthCentralWiki, $wgMWOAuthSharedUserIDs, $wgMWOAuthSharedUserSource;

		if ( $wgMWOAuthSharedUserIDs ) { // global ID required via hook
			$lookup = null;
			if ( class_exists( 'CentralIdLookup' ) ) {
				$lookup = \CentralIdLookup::factory( $wgMWOAuthSharedUserSource );
			}

			if ( $lookup ) {
				$user = $lookup->localUserFromCentralId( $userId );
				if ( $user === null ||
					!$lookup->isAttached( $user ) || !$lookup->isAttached( $user, $wgMWOAuthCentralWiki )
				) {
					$user = false;
				}
			} else {
				if ( !\Hooks::isRegistered( 'OAuthGetLocalUserFromCentralId' ) ) {
					throw new \MWException( "No handler for 'OAuthGetLocalUserFromCentralId' hook" );
				}
				$user = null;
				// Let extensions check that central wiki user ID is attached to a global account
				// and that return the user on this wiki that is attached to that global account
				Hooks::run( 'OAuthGetLocalUserFromCentralId',
					array( $userId, $wgMWOAuthCentralWiki, &$user, $wgMWOAuthSharedUserSource ) );
				// If there is no local user, the extension should set the user to false
				if ( $user === null ) {
					throw new \MWException( 'Could not lookup user from ID via hook.' );
				}
			}
		} else {
			$user = \User::newFromId( $userId );
		}

		return $user;
	}

	/**
	 * Given a local User object, get the user ID for that user on the central wiki
	 *
	 * @param \User $user
	 * @throws \MWException
	 * @return integer|bool ID or false if not found
	 */
	public static function getCentralIdFromLocalUser( \User $user ) {
		global $wgMWOAuthCentralWiki, $wgMWOAuthSharedUserIDs, $wgMWOAuthSharedUserSource;

		if ( $wgMWOAuthSharedUserIDs ) { // global ID required via hook
			if ( isset( $user->oAuthUserData['centralId'] ) ) {
				$id = $user->oAuthUserData['centralId'];
			} else {
				$lookup = null;
				if ( class_exists( 'CentralIdLookup' ) ) {
					$lookup = \CentralIdLookup::factory( $wgMWOAuthSharedUserSource );
				}
				if ( $lookup ) {
					if ( !$lookup->isAttached( $user ) || !$lookup->isAttached( $user, $wgMWOAuthCentralWiki ) ) {
						$id = false;
					} else {
						$id = $lookup->centralIdFromLocalUser( $user );
						if ( $id === 0 ) {
							$id = false;
						}
					}
				} else {
					if ( !\Hooks::isRegistered( 'OAuthGetCentralIdFromLocalUser' ) ) {
						throw new \MWException( "No handler for 'OAuthGetCentralIdFromLocalUser' hook" );
					}
					$id = null;
					// Let CentralAuth check that $user is attached to a global account and
					// that the foreign local account on the central wiki is also attached to it
					Hooks::run( 'OAuthGetCentralIdFromLocalUser',
						array( $user, $wgMWOAuthCentralWiki, &$id, $wgMWOAuthSharedUserSource ) );
					// If there is no such user, the extension should set the ID to false
					if ( $id === null ) {
						throw new \MWException( 'Could not lookup ID for user via hook.' );
					}
				}
				// Process cache the result to avoid queries
				$user->oAuthUserData['centralId'] = $id;
			}
		} else {
			$id = $user->getId();
		}

		return $id;
	}

	/**
	 * Given a username, get the user ID for that user on the central wiki. This
	 * function MUST NOT be used to determine if a user is attached on the central
	 * wiki. It's only intended to resolve the central id of a username.
	 * @param string $username
	 * @throws \MWException
	 * @return integer|bool ID or false if not found
	 */
	public static function getCentralIdFromUserName( $username ) {
		global $wgMWOAuthCentralWiki, $wgMWOAuthSharedUserIDs, $wgMWOAuthSharedUserSource;

		if ( $wgMWOAuthSharedUserIDs ) { // global ID required via hook
			$lookup = null;
			if ( class_exists( 'CentralIdLookup' ) ) {
				$lookup = \CentralIdLookup::factory( $wgMWOAuthSharedUserSource );
			}

			if ( $lookup ) {
				$id = $lookup->centralIdFromName( $username );
				if ( $id === 0 ) {
					$id = false;
				}
			} else {
				if ( !\Hooks::isRegistered( 'OAuthGetCentralIdFromUserName' ) ) {
					throw new \MWException( "No handler for 'OAuthGetCentralIdFromLocalUser' hook" );
				}

				$id = null;
				// Let CentralAuth check that $user is attached to a global account and
				// that the foreign local account on the central wiki is also attached to it
				Hooks::run( 'OAuthGetCentralIdFromUserName',
					array( $username, $wgMWOAuthCentralWiki, &$id, $wgMWOAuthSharedUserSource ) );
				if ( $id === null ) {
					throw new \MWException( 'Could not lookup ID for user via hook.' );
				}
			}
		} else {
			$id = false;
			$user = \User::newFromName( $username );
			if ( $user instanceof \User && $user->getId() > 0 ) {
				$id = $user->getId();
			}
		}

		return $id;
	}

	/**
	 * Get the effective secret key/token to use for OAuth purposes.
	 *
	 * For example, the "secret key" and "access secret" values that are
	 * used for authenticating request should be the result of applying this
	 * function to the respective values stored in the DB. This means that
	 * a leak of DB values is not enough to impersonate consumers.
	 *
	 * @param string $secret
	 * @return string
	 */
	public static function hmacDBSecret( $secret ) {
		global $wgOAuthSecretKey;

		return $wgOAuthSecretKey ? hash_hmac( 'sha1', $secret, $wgOAuthSecretKey ) : $secret;
	}

	/**
	 * Generate a link to Special:OAuth/grants for a particular grant name.
	 * This should be used to link end users to a full description of what
	 * rights they are giving when they authorize a grant.
	 * @param string $grant the grant name
	 * @return string (proto-relative) HTML link
	 */
	public static function getGrantsLink( $grant ) {
		return \Linker::linkKnown(
			\SpecialPage::getTitleFor( 'OAuth', 'grants', $grant ),
			htmlspecialchars( self::grantName( $grant ) )
		);
	}

	/**
	 * Run hook to override a message keys that might need to be changed
	 * across all sites in this cluster.
	 * @param string $msgKey the Message key
	 * @return string the Message key to use
	 */
	public static function getSiteMessage( $msgKey ) {
		Hooks::run( 'OAuthReplaceMessage', array( &$msgKey ) );
		return $msgKey;
	}

	/**
	 * Get a link to the central wiki's user talk page of a user.
	 *
	 * @param string $username the username of the User Talk link
	 * @return string the (proto-relative, urlencoded) url of the central wiki's user talk page
	 */
	public static function getCentralUserTalk( $username ) {
		global $wgMWOAuthCentralWiki, $wgMWOAuthSharedUserIDs;

		if ( $wgMWOAuthSharedUserIDs ) {
			$url = \WikiMap::getForeignURL(
				$wgMWOAuthCentralWiki,
				"User_talk:$username"
			);
		} else {
			$url = \Title::makeTitleSafe( NS_USER_TALK, $username )->getFullURL();
		}
		return $url;
	}
}
