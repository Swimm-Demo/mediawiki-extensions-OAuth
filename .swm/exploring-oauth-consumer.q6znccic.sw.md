---
title: Exploring OAuth Consumer
---
# Consumer Class Overview

<SwmSnippet path="/src/Backend/Consumer.php" line="37">

---

The <SwmToken path="/src/Backend/Consumer.php" pos="41:4:4" line-data="abstract class Consumer extends MWOAuthDAO {">`Consumer`</SwmToken> class is an abstract representation of an <SwmToken path="/src/Backend/Consumer.php" pos="39:9:9" line-data=" * Representation of an OAuth consumer.">`OAuth`</SwmToken> consumer. It defines the structure and behavior of <SwmToken path="/src/Backend/Consumer.php" pos="39:9:9" line-data=" * Representation of an OAuth consumer.">`OAuth`</SwmToken> consumers, including their properties, stages, and methods for interacting with the database.

```

/**
 * Representation of an OAuth consumer.
 */
abstract class Consumer extends MWOAuthDAO {
	public const OAUTH_VERSION_1 = 1;
	public const OAUTH_VERSION_2 = 2;
```

---

</SwmSnippet>

# Key properties and constants

<SwmSnippet path="/src/Backend/Consumer.php" line="51">

---

The <SwmToken path="/src/Backend/Consumer.php" pos="79:8:8" line-data="	/** @var bool Consumer is for use by the owner only */">`Consumer`</SwmToken> class includes several properties that define the attributes of an `OAuth` consumer, such as <SwmToken path="/src/Backend/Consumer.php" pos="53:4:4" line-data="	protected $id;">`id`</SwmToken>, <SwmToken path="/src/Backend/Consumer.php" pos="55:4:4" line-data="	protected $consumerKey;">`consumerKey`</SwmToken>, <SwmToken path="/src/Backend/Consumer.php" pos="57:4:4" line-data="	protected $name;">`name`</SwmToken>, <SwmToken path="/src/Backend/Consumer.php" pos="61:4:4" line-data="	protected $userId;">`userId`</SwmToken>, <SwmToken path="/src/Backend/Consumer.php" pos="63:4:4" line-data="	protected $version;">`version`</SwmToken>, <SwmToken path="/src/Backend/Consumer.php" pos="65:4:4" line-data="	protected $callbackUrl;">`callbackUrl`</SwmToken>, and more. These properties are used for identifying and managing <SwmToken path="/src/Backend/Consumer.php" pos="64:8:8" line-data="	/** @var string OAuth callback URL for authorization step */">`OAuth`</SwmToken> consumers.

```

	/** @var int|null Unique ID */
	protected $id;
	/** @var string Hex token */
	protected $consumerKey;
	/** @var string Name of connected application */
	protected $name;
	/** @var int Publisher's central user ID. $wgMWOAuthSharedUserIDs defines which central ID
	 *    provider to use.
	 */
	protected $userId;
	/** @var string Version used for handshake breaking changes */
	protected $version;
	/** @var string OAuth callback URL for authorization step */
	protected $callbackUrl;
	/**
	 * @var bool OAuth callback URL is a prefix and we allow all URLs which
	 *   have callbackUrl as the prefix
	 */
	protected $callbackIsPrefix;
	/** @var string Application description */
	protected $description;
	/** @var string Publisher email address */
	protected $email;
	/** @var string|null TS_MW timestamp of when email address was confirmed */
	protected $emailAuthenticated;
	/** @var bool User accepted the developer agreement */
	protected $developerAgreement;
	/** @var bool Consumer is for use by the owner only */
	protected $ownerOnly;
	/** @var int Version of the OAuth protocol */
	protected $oauthVersion;
	/** @var string Wiki ID the application can be used on (or "*" for all) */
	protected $wiki;
	/** @var string TS_MW timestamp of proposal */
	protected $registration;
	/** @var string Secret HMAC key */
	protected $secretKey;
	/** @var string Public RSA key */
	protected $rsaKey;
	/** @var array List of grants */
	protected $grants;
	/** @var MWRestrictions IP restrictions */
	protected $restrictions;
	/** @var int MWOAuthConsumer::STAGE_* constant */
	protected $stage;
	/** @var string TS_MW timestamp of last stage change */
	protected $stageTimestamp;
	/** @var bool Indicates this consumer's information is suppressed */
	protected $deleted;
	/** @var bool Indicates whether the client (consumer) is able to keep the secret */
	protected $oauth2IsConfidential;
	/** @var array OAuth2 grant types available to the client */
	protected $oauth2GrantTypes;
```

---

</SwmSnippet>

<SwmSnippet path="/src/Backend/Consumer.php" line="105">

---

# Lifecycle of a Consumer

The class also defines constants representing different stages of the consumer lifecycle, such as <SwmToken path="/src/Backend/Consumer.php" pos="107:5:5" line-data="	public const STAGE_PROPOSED = 0;">`STAGE_PROPOSED`</SwmToken>, <SwmToken path="/src/Backend/Consumer.php" pos="108:5:5" line-data="	public const STAGE_APPROVED = 1;">`STAGE_APPROVED`</SwmToken>, <SwmToken path="/src/Backend/Consumer.php" pos="109:5:5" line-data="	public const STAGE_REJECTED = 2;">`STAGE_REJECTED`</SwmToken>, <SwmToken path="/src/Backend/Consumer.php" pos="110:5:5" line-data="	public const STAGE_EXPIRED  = 3;">`STAGE_EXPIRED`</SwmToken>, and <SwmToken path="/src/Backend/Consumer.php" pos="111:5:5" line-data="	public const STAGE_DISABLED = 4;">`STAGE_DISABLED`</SwmToken>.

```

	/* Stages that registered consumer takes (stored in DB) */
	public const STAGE_PROPOSED = 0;
	public const STAGE_APPROVED = 1;
	public const STAGE_REJECTED = 2;
	public const STAGE_EXPIRED  = 3;
	public const STAGE_DISABLED = 4;
```

---

</SwmSnippet>

# Methods for handling <SwmToken path="/src/Backend/Consumer.php" pos="39:9:9" line-data=" * Representation of an OAuth consumer.">`OAuth`</SwmToken> consumers

The <SwmToken path="src/Backend/Consumer.php" pos="41:4:4" line-data="abstract class Consumer extends MWOAuthDAO {">`Consumer`</SwmToken> class includes methods to handle OAuth-specific functionality, such as generating callback <SwmToken path="src/Backend/Consumer.php" pos="67:28:28" line-data="	 * @var bool OAuth callback URL is a prefix and we allow all URLs which">`URLs`</SwmToken>, authorizing users, and checking if a consumer is usable by a specific user. These methods ensure that the <SwmToken path="src/Backend/Consumer.php" pos="22:6:6" line-data="namespace MediaWiki\Extension\OAuth\Backend;">`OAuth`</SwmToken> process is seamless and secure.

<SwmSnippet path="src/Backend/Consumer.php" line="722">

---

The <SwmToken path="src/Backend/Consumer.php" pos="722:5:5" line-data="	public function isUsableBy( User $user ) {">`isUsableBy`</SwmToken> method in the <SwmToken path="src/Backend/Consumer.php" pos="41:4:4" line-data="abstract class Consumer extends MWOAuthDAO {">`Consumer`</SwmToken> class checks if the consumer is usable by a specific user. It includes conditions such as being approved for <SwmToken path="src/Backend/Consumer.php" pos="715:9:11" line-data="	 * - Approved for multi-user use">`multi-user`</SwmToken> use, approved for <SwmToken path="src/Backend/Consumer.php" pos="716:9:11" line-data="	 * - Approved for owner-only use and is owned by $user">`owner-only`</SwmToken> use and owned by the user, or still pending approval and owned by the user.

```
	public function isUsableBy( User $user ) {
		if ( $this->stage === self::STAGE_APPROVED && !$this->getOwnerOnly() ) {
			return true;
		} elseif ( $this->stage === self::STAGE_PROPOSED || $this->stage === self::STAGE_APPROVED ) {
			$centralId = Utils::getCentralIdFromLocalUser( $user );
			return ( $centralId && $this->userId === $centralId );
		}

		return false;
	}
```

---

</SwmSnippet>

<SwmSnippet path="src/Backend/Consumer.php" line="147">

---

The <SwmToken path="/src/Backend/Consumer.php" pos="147:7:7" line-data="	protected static function getSchema() {">`getSchema`</SwmToken> method returns the database schema for the <SwmToken path="/src/Backend/Consumer.php" pos="39:9:9" line-data=" * Representation of an OAuth consumer.">`OAuth`</SwmToken> consumer table, mapping class properties to database fields.

```
	protected static function getSchema() {
		return [
			'table'          => 'oauth_registered_consumer',
			'fieldColumnMap' => [
				'id'                    => 'oarc_id',
				'consumerKey'           => 'oarc_consumer_key',
				'name'                  => 'oarc_name',
				'userId'                => 'oarc_user_id',
				'version'               => 'oarc_version',
				'callbackUrl'           => 'oarc_callback_url',
				'callbackIsPrefix'      => 'oarc_callback_is_prefix',
				'description'           => 'oarc_description',
				'email'                 => 'oarc_email',
				'emailAuthenticated'    => 'oarc_email_authenticated',
				'oauthVersion'          => 'oarc_oauth_version',
				'developerAgreement'    => 'oarc_developer_agreement',
				'ownerOnly'             => 'oarc_owner_only',
				'wiki'                  => 'oarc_wiki',
				'grants'                => 'oarc_grants',
				'registration'          => 'oarc_registration',
				'secretKey'             => 'oarc_secret_key',
				'rsaKey'                => 'oarc_rsa_key',
				'restrictions'          => 'oarc_restrictions',
				'stage'                 => 'oarc_stage',
				'stageTimestamp'        => 'oarc_stage_timestamp',
				'deleted'               => 'oarc_deleted',
				'oauth2IsConfidential'  => 'oarc_oauth2_is_confidential',
				'oauth2GrantTypes'      => 'oarc_oauth2_allowed_grants',
			],
			'idField'        => 'id',
			'autoIncrField'  => 'id',
		];
	}
```

---

</SwmSnippet>

<SwmSnippet path="src/Backend/Consumer.php" line="221">

---

The <SwmToken path="/src/Backend/Consumer.php" pos="221:7:7" line-data="	public static function newFromKey( IDatabase $db, $key, $flags = 0 ) {">`newFromKey`</SwmToken> method retrieves a consumer from the database using its consumer key.

```
	public static function newFromKey( IDatabase $db, $key, $flags = 0 ) {
		$queryBuilder = $db->newSelectQueryBuilder()
			->select( array_values( static::getFieldColumnMap() ) )
			->from( static::getTable() )
			->where( [ 'oarc_consumer_key' => (string)$key ] )
			->caller( __METHOD__ );
		if ( $flags & IDBAccessObject::READ_LOCKING ) {
			$queryBuilder->forUpdate();
		}
		$row = $queryBuilder->fetchRow();

		if ( $row ) {
			return static::newFromRow( $db, $row );
		} else {
			return false;
		}
	}
```

---

</SwmSnippet>

# Authorization and permission checks

The <SwmToken path="/src/Backend/Consumer.php" pos="41:4:4" line-data="abstract class Consumer extends MWOAuthDAO {">`Consumer`</SwmToken> class includes methods for handling authorization and permission checks to ensure that only authorized users can access or modify consumer information.

<SwmSnippet path="src/Backend/Consumer.php" line="588">

---

The <SwmToken path="/src/Backend/Consumer.php" pos="588:5:5" line-data="	protected function conductAuthorizationChecks( User $mwUser ) {">`conductAuthorizationChecks`</SwmToken> method verifies that a user has the necessary permissions to authorize a consumer.

```
	protected function conductAuthorizationChecks( User $mwUser ) {
		global $wgBlockDisablesLogin;

		// Check that user and consumer are in good standing
		if ( $mwUser->isLocked() || ( $wgBlockDisablesLogin && $mwUser->getBlock() ) ) {
			throw new MWOAuthException( 'mwoauthserver-insufficient-rights', [
				Message::rawParam( Linker::makeExternalLink(
					'https://www.mediawiki.org/wiki/Help:OAuth/Errors#E007',
					'E007',
					true
				) ),
				'consumer' => $this->getConsumerKey(),
				'consumer_name' => $this->getName(),
			] );
```

---

</SwmSnippet>

<SwmSnippet path="src/Backend/Consumer.php" line="820">

---

The <SwmToken path="/src/Backend/Consumer.php" pos="820:5:5" line-data="	protected function userCanSee( $name, IContextSource $context ) {">`userCanSee`</SwmToken> method checks if a user can see a field with standard visibility.

```
	protected function userCanSee( $name, IContextSource $context ) {
		$permissionManager = MediaWikiServices::getInstance()->getPermissionManager();

		if ( $this->getDeleted()
			&& !$permissionManager->userHasRight( $context->getUser(), 'mwoauthviewsuppressed' )
		) {
			return $context->msg( 'mwoauth-field-hidden' );
		} else {
			return true;
		}
	}
```

---

</SwmSnippet>

<SwmSnippet path="src/Backend/Consumer.php" line="866">

---

The <SwmToken path="/src/Backend/Consumer.php" pos="866:5:5" line-data="	protected function userCanSeeSecurity( $name, IContextSource $context ) {">`userCanSeeSecurity`</SwmToken> method checks if a user can see a field related to application security.

```
	protected function userCanSeeSecurity( $name, IContextSource $context ) {
		$permissionManager = MediaWikiServices::getInstance()->getPermissionManager();
		$user = $context->getUser();

		if ( $user->getId() === $this->getLocalUserId() ) {
			// owners can always see the details of their apps, unless the app got deleted-suppressed
			return $this->userCanSee( $name, $context );
		} elseif ( $this->getOwnerOnly() ) {
			// owner-only apps are essentially personal API tokens, nobody else's business
			return $context->msg( 'mwoauth-field-private' );
		} elseif ( !$permissionManager->userHasRight( $user, 'mwoauthmanageconsumer' ) ) {
			// if you are not the owner or an admin you definitely shouldn't see security details
			return $context->msg( 'mwoauth-field-private' );
		} else {
			// OAuth admin looking at non-owner-only app. Just need to check  suppression.
			return $this->userCanSee( $name, $context );
		}
	}
```

---

</SwmSnippet>

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
