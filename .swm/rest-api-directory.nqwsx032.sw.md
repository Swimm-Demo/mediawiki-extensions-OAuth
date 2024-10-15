---
title: Rest API Directory
---

# Rest API Overview

The Rest API directory provides a set of endpoints that allow external applications to interact with the `MediaWiki OAuth` extension. It enables functionalities such as obtaining access tokens, authorizing clients, and managing `OAuth` clients.

# Base Classes

<SwmSnippet path="/src/Rest/Handler/AuthenticationHandler.php" line="24">

---

The <SwmToken path="src/Rest/Handler/AuthenticationHandler.php" pos="24:4:4" line-data="abstract class AuthenticationHandler extends Handler {">`AuthenticationHandler`</SwmToken> class is a base class that handles authentication-related tasks for the Rest API. This class includes methods for validating requests, handling errors, and managing user sessions.

```hack
abstract class AuthenticationHandler extends Handler {
```

---

</SwmSnippet>

<SwmSnippet path="/src/Rest/Handler/AbstractClientHandler.php" line="22">

---

The <SwmToken path="/src/Rest/Handler/AbstractClientHandler.php" pos="22:4:4" line-data="abstract class AbstractClientHandler extends Handler {">`AbstractClientHandler`</SwmToken> class serves as a base for operations on `OAuth` 2.0 clients, providing initialization and basic checks. It also maps parameter names between `OAuth` 2.0 and 1.0 terminology, ensuring compatibility.

```hack
abstract class AbstractClientHandler extends Handler {
```

---

</SwmSnippet>

# Specific API Functionalities

Other classes in this directory, like <SwmToken path="/src/Rest/Handler/Authorize.php" pos="28:2:2" line-data="class Authorize extends AuthenticationHandler {">`Authorize`</SwmToken>, <SwmToken path="src/Rest/Handler/AuthenticationHandler.php" pos="9:10:10" line-data="use MediaWiki\Extension\OAuth\AuthorizationProvider\AccessToken as AccessTokenProvider;">`AccessToken`</SwmToken>, <SwmToken path="/src/Rest/Handler/RequestClient.php" pos="17:2:2" line-data="class RequestClient extends AbstractClientHandler {">`RequestClient`</SwmToken>, and <SwmToken path="/src/Rest/Handler/ResetClientSecret.php" pos="14:2:2" line-data="class ResetClientSecret extends AbstractClientHandler {">`ResetClientSecret`</SwmToken> extend these base classes to implement specific API functionalities.

# `OAuth` Endpoints

The Rest API directory includes several `OAuth` endpoints that facilitate various operations. For example:

<SwmSnippet path="src/Rest/Handler/ListClients.php" line="76">

---

## <SwmToken path="src/Rest/Handler/ListClients.php" pos="19:7:9" line-data=" * Handles the oauth2/consumers endpoint, which returns">`oauth2/consumers`</SwmToken>

The <SwmToken path="src/Rest/Handler/ListClients.php" pos="19:7:9" line-data=" * Handles the oauth2/consumers endpoint, which returns">`oauth2/consumers`</SwmToken> endpoint returns a list of registered consumers for the user. This endpoint is handled by the <SwmToken path="src/Rest/Handler/ListClients.php" pos="22:2:2" line-data="class ListClients extends SimpleHandler {">`ListClients`</SwmToken> class, which extends <SwmToken path="src/Rest/Handler/ListClients.php" pos="11:6:6" line-data="use MediaWiki\Rest\SimpleHandler;">`SimpleHandler`</SwmToken>. It maps various properties from the database to the response and retrieves the list of consumers based on the user's central ID.

```
	public function run(): ResponseInterface {
		// @todo Inject this, when there is a good way to do that, see T239753
		$user = RequestContext::getMain()->getUser();

		$centralId = Utils::getCentralIdFromUserName( $user->getName() );
		$responseFactory = $this->getResponseFactory();

		if ( !$centralId ) {
			throw new LocalizedHttpException(
				new MessageValue( 'rest-nonexistent-user', [ $user->getName() ] ), 404
			);
		}
		$response = $this->getDbResults( $centralId );

		return $responseFactory->createJson( $response );
	}
```

---

</SwmSnippet>

<SwmSnippet path="src/Rest/Handler/AccessToken.php" line="38">

---

## <SwmToken path="src/Rest/Handler/AccessToken.php" pos="16:7:9" line-data=" * Handles the oauth2/access_token endpoint, which can be used after the user has returned from">`oauth2/access_token`</SwmToken>

The <SwmToken path="src/Rest/Handler/AccessToken.php" pos="16:7:9" line-data=" * Handles the oauth2/access_token endpoint, which can be used after the user has returned from">`oauth2/access_token`</SwmToken> endpoint is used to trade the received authorization code for an access token after the user has returned from the authorization dialog. This endpoint is handled by the <SwmToken path="src/Rest/Handler/AuthenticationHandler.php" pos="9:10:10" line-data="use MediaWiki\Extension\OAuth\AuthorizationProvider\AccessToken as AccessTokenProvider;">`AccessToken`</SwmToken> class, which extends <SwmToken path="src/Rest/Handler/AuthenticationHandler.php" pos="24:4:4" line-data="abstract class AuthenticationHandler extends Handler {">`AuthenticationHandler`</SwmToken>. It processes various grant types such as <SwmToken path="src/Rest/Handler/AccessToken.php" pos="22:10:10" line-data="	private const GRANT_TYPE_AUTHORIZATION_CODE = &#39;authorization_code&#39;;">`authorization_code`</SwmToken>, <SwmToken path="src/Rest/Handler/AccessToken.php" pos="21:10:10" line-data="	private const GRANT_TYPE_CLIENT_CREDENTIALS = &#39;client_credentials&#39;;">`client_credentials`</SwmToken>, and <SwmToken path="src/Rest/Handler/AccessToken.php" pos="23:10:10" line-data="	private const GRANT_TYPE_REFRESH_TOKEN = &#39;refresh_token&#39;;">`refresh_token`</SwmToken>

```
	public function execute() {
		$response = new Response();

		try {
			if ( $this->queuedError ) {
				throw $this->queuedError;
			}
			$request = ServerRequest::fromGlobals()->withParsedBody(
				$this->getValidatedBody()
			);

			$authProvider = $this->getAuthorizationProvider();
			return $authProvider->getAccessTokens( $request, $response );
		} catch ( OAuthServerException $exception ) {
			return $this->errorResponse( $exception, $response );
		} catch ( Throwable $exception ) {
			MWExceptionHandler::logException( $exception );
			return $this->errorResponse(
				OAuthServerException::serverError( $exception->getMessage(), $exception ),
				$response
			);
		}
	}
```

---

</SwmSnippet>

&nbsp;

_This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human_

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
