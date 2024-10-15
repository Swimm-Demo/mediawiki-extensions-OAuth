---
title: OAuth Access Overview
---
# `OAuth` Access Overview

`OAuth` Access refers to the mechanism by which third-party applications can securely interact with <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuthConsumerRegistration.php" pos="3:2:2" line-data="namespace MediaWiki\Extension\OAuth\Frontend\SpecialPages;">`MediaWiki`</SwmToken> on behalf of users. This is achieved by issuing access tokens that applications can use to make authorized API requests.

# `OAuth` Versions

The function <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuthConsumerRegistration.php" pos="182:14:14" line-data="								&#39;mwoauth-oauth-version&#39; =&gt; $cmrAc-&gt;getOAuthVersion() === Consumer::OAUTH_VERSION_2 ?">`getOAuthVersion`</SwmToken> is used to determine the `OAuth` version being used, which can be either `OAuth` 1.0a or `OAuth` 2.0. This is used for handling the different flows and requirements of each version.

<SwmSnippet path="/src/Frontend/SpecialPages/SpecialMWOAuthConsumerRegistration.php" line="181">

---

The function <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuthConsumerRegistration.php" pos="182:14:14" line-data="								&#39;mwoauth-oauth-version&#39; =&gt; $cmrAc-&gt;getOAuthVersion() === Consumer::OAUTH_VERSION_2 ?">`getOAuthVersion`</SwmToken> is used within the <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuthConsumerRegistration.php" pos="86:5:5" line-data="	public function execute( $par ) {">`execute`</SwmToken> method to determine the <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuthConsumerRegistration.php" pos="3:6:6" line-data="namespace MediaWiki\Extension\OAuth\Frontend\SpecialPages;">`OAuth`</SwmToken> version and handle the flow accordingly.

```hack
								'mwoauth-consumer-version' => $cmrAc->getVersion(),
								'mwoauth-oauth-version' => $cmrAc->getOAuthVersion() === Consumer::OAUTH_VERSION_2 ?
									$this->msg( 'mwoauth-oauth-version-2' )->text() :
```

---

</SwmSnippet>

# Access Tokens

Access tokens are issued to clients after successful authorization and are used to authenticate API requests. The `AccessTokenEntity` class represents these tokens and includes methods for setting and validating the client and user associated with the token.

# Client Application

The `ClientEntity` class represents the client application that is requesting access. It includes methods for validating the client's credentials and determining the allowed grant types and scopes.

# Consumer Access Control

The <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuthConsumerRegistration.php" pos="32:10:10" line-data="use MediaWiki\Extension\OAuth\Control\ConsumerAccessControl;">`ConsumerAccessControl`</SwmToken> class manages the permissions and access control for <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuthConsumerRegistration.php" pos="3:6:6" line-data="namespace MediaWiki\Extension\OAuth\Frontend\SpecialPages;">`OAuth`</SwmToken> consumers, ensuring that only authorized clients can access specific resources.

&nbsp;

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
