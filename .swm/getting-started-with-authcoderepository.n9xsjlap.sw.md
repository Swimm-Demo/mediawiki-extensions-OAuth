---
title: Getting Started with AuthCodeRepository
---
# Introduction

The <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="26:8:8" line-data="		$this-&gt;authCodeTokenRepo = AuthCodeRepository::factory();">`AuthCodeRepository`</SwmToken> is responsible for managing authorization codes within the <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="3:6:6" line-data="namespace MediaWiki\Extension\OAuth\Tests\Repository;">`OAuth`</SwmToken> extension. It provides methods to create, persist, and revoke authorization codes, ensuring they are properly stored and can be retrieved or invalidated as needed. This document will guide you through the process of getting started with the <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="26:8:8" line-data="		$this-&gt;authCodeTokenRepo = AuthCodeRepository::factory();">`AuthCodeRepository`</SwmToken>.

# Creating and Persisting Authorization Codes

In the <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="23:5:5" line-data="	protected function setUp(): void {">`setUp`</SwmToken> method, a new authorization code is created using <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="26:8:12" line-data="		$this-&gt;authCodeTokenRepo = AuthCodeRepository::factory();">`AuthCodeRepository::factory()`</SwmToken> and <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="27:13:15" line-data="		$this-&gt;authCodeToken = $this-&gt;authCodeTokenRepo-&gt;getNewAuthCode();">`getNewAuthCode()`</SwmToken>. The code is then configured with an identifier, client, and expiry date.

<SwmSnippet path="/tests/phpunit/Repository/AuthCodeRepositoryTest.php" line="23">

---

The <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="23:5:5" line-data="	protected function setUp(): void {">`setUp`</SwmToken> method initializes the authorization code repository and creates a new authorization code.

```hack
	protected function setUp(): void {
		parent::setUp();

		$this->authCodeTokenRepo = AuthCodeRepository::factory();
		$this->authCodeToken = $this->authCodeTokenRepo->getNewAuthCode();
		$this->authCodeToken->setIdentifier( bin2hex( random_bytes( 20 ) ) );
		$this->authCodeToken->setClient(
			MockClientEntity::newMock( $this->getTestUser()->getUser() )
		);
		$this->authCodeToken->setExpiryDateTime(
			( new DateTimeImmutable() )->add( new DateInterval( 'PT1H' ) )
		);
	}
```

---

</SwmSnippet>

# Persisting Authorization Codes

The <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="37:5:5" line-data="	public function testPersistingToken() {">`testPersistingToken`</SwmToken> method demonstrates how to persist a new authorization code using `persistNewAuthCode()`. It then verifies that the code is not revoked.

<SwmSnippet path="/tests/phpunit/Repository/AuthCodeRepositoryTest.php" line="37">

---

The <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="37:5:5" line-data="	public function testPersistingToken() {">`testPersistingToken`</SwmToken> method persists the authorization code and checks that it is not revoked.

```hack
	public function testPersistingToken() {
		$this->authCodeTokenRepo->persistNewAuthCode( $this->authCodeToken );

		$this->assertFalse(
			$this->authCodeTokenRepo->isAuthCodeRevoked( $this->authCodeToken->getIdentifier() ),
			'AuthCode token must be persisted'
		);
	}
```

---

</SwmSnippet>

# Revoking Authorization Codes

The <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="46:5:5" line-data="	public function testRevokingToken() {">`testRevokingToken`</SwmToken> method shows how to revoke an authorization code using `revokeAuthCode()`. It then checks that the code is indeed revoked.

<SwmSnippet path="/tests/phpunit/Repository/AuthCodeRepositoryTest.php" line="46">

---

The <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="46:5:5" line-data="	public function testRevokingToken() {">`testRevokingToken`</SwmToken> method revokes the authorization code and verifies its revocation status.

```hack
	public function testRevokingToken() {
		$this->authCodeTokenRepo->revokeAuthCode( $this->authCodeToken->getIdentifier() );

		$this->assertTrue(
			$this->authCodeTokenRepo->isAuthCodeRevoked( $this->authCodeToken->getIdentifier() ),
			'AuthCode token should be revoked'
		);
	}
```

---

</SwmSnippet>

# Main Functions

There are several main functions in <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="26:8:8" line-data="		$this-&gt;authCodeTokenRepo = AuthCodeRepository::factory();">`AuthCodeRepository`</SwmToken>. Some of them are <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="38:6:6" line-data="		$this-&gt;authCodeTokenRepo-&gt;persistNewAuthCode( $this-&gt;authCodeToken );">`persistNewAuthCode`</SwmToken>, <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="47:6:6" line-data="		$this-&gt;authCodeTokenRepo-&gt;revokeAuthCode( $this-&gt;authCodeToken-&gt;getIdentifier() );">`revokeAuthCode`</SwmToken>, and <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="41:6:6" line-data="			$this-&gt;authCodeTokenRepo-&gt;isAuthCodeRevoked( $this-&gt;authCodeToken-&gt;getIdentifier() ),">`isAuthCodeRevoked`</SwmToken>. We will dive a little into these functions.

## <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="38:6:6" line-data="		$this-&gt;authCodeTokenRepo-&gt;persistNewAuthCode( $this-&gt;authCodeToken );">`persistNewAuthCode`</SwmToken>

The <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="38:6:6" line-data="		$this-&gt;authCodeTokenRepo-&gt;persistNewAuthCode( $this-&gt;authCodeToken );">`persistNewAuthCode`</SwmToken> function is used to store a new authorization code in the repository. This function ensures that the authorization code is saved and can be retrieved later. In the test, it verifies that the token is persisted by checking that it is not revoked.

## <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="47:6:6" line-data="		$this-&gt;authCodeTokenRepo-&gt;revokeAuthCode( $this-&gt;authCodeToken-&gt;getIdentifier() );">`revokeAuthCode`</SwmToken>

The <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="47:6:6" line-data="		$this-&gt;authCodeTokenRepo-&gt;revokeAuthCode( $this-&gt;authCodeToken-&gt;getIdentifier() );">`revokeAuthCode`</SwmToken> function is used to invalidate an existing authorization code. This function marks the authorization code as revoked, ensuring it can no longer be used. The test verifies that the token is correctly revoked by checking its status.

<SwmSnippet path="/tests/phpunit/Repository/AuthCodeRepositoryTest.php" line="46">

---

The <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="47:6:6" line-data="		$this-&gt;authCodeTokenRepo-&gt;revokeAuthCode( $this-&gt;authCodeToken-&gt;getIdentifier() );">`revokeAuthCode`</SwmToken> function invalidates the authorization code and verifies its revocation status.

```hack
	public function testRevokingToken() {
		$this->authCodeTokenRepo->revokeAuthCode( $this->authCodeToken->getIdentifier() );

		$this->assertTrue(
			$this->authCodeTokenRepo->isAuthCodeRevoked( $this->authCodeToken->getIdentifier() ),
			'AuthCode token should be revoked'
		);
```

---

</SwmSnippet>

<SwmSnippet path="/tests/phpunit/Repository/AuthCodeRepositoryTest.php" line="40">

---

The <SwmToken path="tests/phpunit/Repository/AuthCodeRepositoryTest.php" pos="41:6:6" line-data="			$this-&gt;authCodeTokenRepo-&gt;isAuthCodeRevoked( $this-&gt;authCodeToken-&gt;getIdentifier() ),">`isAuthCodeRevoked`</SwmToken> function checks the revocation status of the authorization code.

```hack
		$this->assertFalse(
			$this->authCodeTokenRepo->isAuthCodeRevoked( $this->authCodeToken->getIdentifier() ),
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](/)</sup></SwmMeta>
