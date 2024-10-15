---
title: Authorization Providers Overview
---

# Overview

Authorization Providers are responsible for managing the authorization process within the <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="53:12:12" line-data="		$logger = LoggerFactory::getInstance( &#39;OAuth&#39; );">`OAuth`</SwmToken> extension. They interact with the <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="7:8:8" line-data="use League\OAuth2\Server\AuthorizationServer;">`AuthorizationServer`</SwmToken> to handle various grant types and ensure that the correct authorization flow is followed.

# Key Properties

The <SwmToken path="/src/AuthorizationProvider/AuthorizationProvider.php" pos="19:4:4" line-data="abstract class AuthorizationProvider implements IAuthorizationProvider {">`AuthorizationProvider`</SwmToken> class includes several key properties such as <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="23:4:4" line-data="	protected $server;">`server`</SwmToken>, <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="51:2:2" line-data="		$config = $services-&gt;getConfigFactory()-&gt;makeConfig( &#39;mwoauth&#39; );">`config`</SwmToken>, <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="33:4:4" line-data="	protected $user;">`user`</SwmToken>, <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="53:2:2" line-data="		$logger = LoggerFactory::getInstance( &#39;OAuth&#39; );">`logger`</SwmToken>, and <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="43:4:4" line-data="	protected $grant;">`grant`</SwmToken> to facilitate the authorization process.

# Class Methods

<SwmSnippet path="/src/AuthorizationProvider/AuthorizationProvider.php" line="46">

---

The <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="49:7:7" line-data="	public static function factory() {">`factory`</SwmToken> method is used to create instances of <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="46:6:6" line-data="	 * @return AuthorizationProvider">`AuthorizationProvider`</SwmToken>, initializing it with the necessary configuration, server, and logger.

```hack
	 * @return AuthorizationProvider
	 * @throws Exception
	 */
	public static function factory() {
		$services = MediaWikiServices::getInstance();
		$config = $services->getConfigFactory()->makeConfig( 'mwoauth' );
		$serverFactory = AuthorizationServerFactory::factory();
		$logger = LoggerFactory::getInstance( 'OAuth' );

		// @phan-suppress-next-line PhanTypeInstantiateAbstractStatic
		return new static( $config, $serverFactory->getAuthorizationServer(), $logger );
	}
```

---

</SwmSnippet>

<SwmSnippet path="/src/AuthorizationProvider/AuthorizationProvider.php" line="106">

---

The <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="70:4:4" line-data="		$this-&gt;decorateAuthServer();">`decorateAuthServer`</SwmToken> method configures the authorization server with the appropriate grant type and token expiration settings.

```hack
	protected function decorateAuthServer() {
		$grant = $this->getGrantSingleton();
		$grant->setRefreshTokenTTL( $this->getRefreshTokenTTL() );
		$this->server->setDefaultScope( '#default' );
		$this->server->enableGrantType(
			$grant,
			$this->getGrantExpirationInterval()
		);
	}
```

---

</SwmSnippet>

<SwmSnippet path="/src/AuthorizationProvider/AuthorizationProvider.php" line="143">

---

The <SwmToken path="/src/AuthorizationProvider/AuthorizationProvider.php" pos="143:5:5" line-data="	protected function getRefreshTokenTTL() {">`getRefreshTokenTTL`</SwmToken> method returns the refresh token TTL by parsing the expiration value from the <SwmToken path="/src/AuthorizationProvider/AuthorizationProvider.php" pos="144:21:21" line-data="		$intervalSpec = $this-&gt;parseExpiration( $this-&gt;config-&gt;get( &#39;OAuth2RefreshTokenTTL&#39; ) );">`OAuth2RefreshTokenTTL`</SwmToken> config and creating a new <SwmToken path="/src/AuthorizationProvider/AuthorizationProvider.php" pos="145:5:5" line-data="		return new DateInterval( $intervalSpec );">`DateInterval`</SwmToken> object.

```hack
	protected function getRefreshTokenTTL() {
		$intervalSpec = $this->parseExpiration( $this->config->get( 'OAuth2RefreshTokenTTL' ) );
		return new DateInterval( $intervalSpec );
	}
```

---

</SwmSnippet>

# Specific Implementations

Specific implementations of <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="46:6:6" line-data="	 * @return AuthorizationProvider">`AuthorizationProvider`</SwmToken>, such as <SwmToken path="/src/AuthorizationProvider/Grant/AuthorizationCodeAuthorization.php" pos="17:2:2" line-data="class AuthorizationCodeAuthorization extends AuthorizationProvider {">`AuthorizationCodeAuthorization`</SwmToken>, override methods like <SwmToken path="src/AuthorizationProvider/AuthorizationProvider.php" pos="90:7:7" line-data="	abstract protected function getGrant(): GrantTypeInterface;">`getGrant`</SwmToken> to provide the specific grant type logic.

&nbsp;

_This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human_

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
