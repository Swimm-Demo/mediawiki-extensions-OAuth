---
title: OAuth Special Page
---
# Overview

<SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuth.php" pos="62:2:2" line-data="class SpecialMWOAuth extends UnlistedSpecialPage {">`SpecialMWOAuth`</SwmToken> is a special page in `MediaWiki` that handles `OAuth` consumer authorization and token exchange. It extends <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuth.php" pos="62:6:6" line-data="class SpecialMWOAuth extends UnlistedSpecialPage {">`UnlistedSpecialPage`</SwmToken>, meaning it is not listed in the Special:SpecialPages directory but can still be accessed directly. The class is responsible for various OAuth-related tasks, such as initiating the <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuth.php" pos="60:9:9" line-data=" * Page that handles OAuth consumer authorization and token exchange">`OAuth`</SwmToken> handshake, displaying authorization dialogs, and handling token exchanges.

# Purpose

<SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuth.php" pos="62:2:2" line-data="class SpecialMWOAuth extends UnlistedSpecialPage {">`SpecialMWOAuth`</SwmToken> is used to manage `OAuth` consumer authorization and token exchange, facilitating secure interactions between third-party applications and `MediaWiki` on behalf of users.

# Main Entry Point

The <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuth.php" pos="96:5:5" line-data="	public function execute( $subpage ) {">`execute`</SwmToken> method is the main entry point for the page. It sets headers and determines the <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuth.php" pos="60:9:9" line-data=" * Page that handles OAuth consumer authorization and token exchange">`OAuth`</SwmToken> version based on the request. Depending on the subpage parameter, it can handle different `OAuth` flows, such as 'initiate', 'approve', 'authorize', and 'authenticate'.

<SwmSnippet path="/src/Frontend/SpecialPages/SpecialMWOAuth.php" line="96">

---

The <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuth.php" pos="96:5:5" line-data="	public function execute( $subpage ) {">`execute`</SwmToken> method in <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuth.php" pos="62:2:2" line-data="class SpecialMWOAuth extends UnlistedSpecialPage {">`SpecialMWOAuth`</SwmToken> determines the <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuth.php" pos="60:9:9" line-data=" * Page that handles OAuth consumer authorization and token exchange">`OAuth`</SwmToken> version and handles different <SwmToken path="src/Frontend/SpecialPages/SpecialMWOAuth.php" pos="60:9:9" line-data=" * Page that handles OAuth consumer authorization and token exchange">`OAuth`</SwmToken> flows based on the subpage parameter.

```hack
	public function execute( $subpage ) {
		if ( $this->getRequest()->getRawVal( 'display' ) === 'popup' ) {
			// Replace the default skin with a "micro-skin" that omits most of the interface. (T362706)
			// In the future, we might allow normal skins to serve this mode too, if they advise that
			// they support it by setting a skin option, so that colors and fonts could stay consistent.
			$this->getContext()->setSkin( $this->skinFactory->makeSkin( 'authentication-popup' ) );
		}

		$this->setHeaders();

		$user = $this->getUser();
		$request = $this->getRequest();

		$output = $this->getOutput();
		$output->disallowUserJs();

		$config = $this->getConfig();

		// 'raw' for plaintext, 'html' or 'json'.
		// For the initiate and token endpoints, 'raw' also handles the formatting required by
		// https://oauth.net/core/1.0a/#response_parameters
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
