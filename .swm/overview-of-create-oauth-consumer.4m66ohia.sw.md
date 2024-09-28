---
title: Overview of Create OAuth Consumer
---
```mermaid
classDiagram
    class createOAuthConsumer {
        +__construct()
        +execute()
    }
    createOAuthConsumer : -user
    createOAuthConsumer : -name
    createOAuthConsumer : -description
    createOAuthConsumer : -version
    createOAuthConsumer : -callbackUrl
    createOAuthConsumer : -callbackIsPrefix
    createOAuthConsumer : -grants
    createOAuthConsumer : -jsonOnSuccess
    createOAuthConsumer : -approve
    createOAuthConsumer : -requireExtension()
    createOAuthConsumer : -fatalError()
    createOAuthConsumer : -getOption()
    createOAuthConsumer : -hasOption()
    createOAuthConsumer : -Utils::getCentralDB()
    createOAuthConsumer : -ConsumerSubmitControl

%% Swimm:
%% classDiagram
%%     class <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> {
%%         +__construct()
%%         +execute()
%%     }
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -user
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -name
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -description
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -version
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -callbackUrl
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -callbackIsPrefix
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -grants
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -jsonOnSuccess
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -approve
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -requireExtension()
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -fatalError()
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -getOption()
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -hasOption()
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -Utils::getCentralDB()
%%     <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> : -ConsumerSubmitControl
```

# Overview of Create <SwmToken path="maintenance/createOAuthConsumer.php" pos="45:12:12" line-data="		$this-&gt;addDescription( &quot;Create an OAuth consumer&quot; );">`OAuth`</SwmToken> Consumer

The <SwmToken path="maintenance/createOAuthConsumer.php" pos="5:3:3" line-data=" * createOAuthConsumer.php">`createOAuthConsumer`</SwmToken> class is a maintenance script used to create an <SwmToken path="maintenance/createOAuthConsumer.php" pos="45:12:12" line-data="		$this-&gt;addDescription( &quot;Create an OAuth consumer&quot; );">`OAuth`</SwmToken> consumer. It extends the <SwmToken path="maintenance/createOAuthConsumer.php" pos="22:2:2" line-data="use Maintenance;">`Maintenance`</SwmToken> class and provides various options to configure the <SwmToken path="maintenance/createOAuthConsumer.php" pos="45:12:12" line-data="		$this-&gt;addDescription( &quot;Create an OAuth consumer&quot; );">`OAuth`</SwmToken> consumer.

# Initialization

The <SwmToken path="maintenance/createOAuthConsumer.php" pos="43:5:5" line-data="	public function __construct() {">`__construct`</SwmToken> method initializes the script by adding descriptions and options such as <SwmToken path="maintenance/createOAuthConsumer.php" pos="46:8:8" line-data="		$this-&gt;addOption( &#39;user&#39;, &#39;User to run the script as&#39;, true, true );">`user`</SwmToken>, <SwmToken path="maintenance/createOAuthConsumer.php" pos="47:8:8" line-data="		$this-&gt;addOption( &#39;name&#39;, &#39;Application name&#39;, true, true );">`name`</SwmToken>, <SwmToken path="maintenance/createOAuthConsumer.php" pos="48:8:8" line-data="		$this-&gt;addOption( &#39;description&#39;, &#39;Application description&#39;, true, true );">`description`</SwmToken>, <SwmToken path="maintenance/createOAuthConsumer.php" pos="49:8:8" line-data="		$this-&gt;addOption( &#39;version&#39;, &#39;Application version&#39;, true, true );">`version`</SwmToken>, <SwmToken path="maintenance/createOAuthConsumer.php" pos="50:8:8" line-data="		$this-&gt;addOption( &#39;callbackUrl&#39;, &#39;Callback URL&#39;, true, true );">`callbackUrl`</SwmToken>, <SwmToken path="maintenance/createOAuthConsumer.php" pos="52:2:2" line-data="			&#39;callbackIsPrefix&#39;,">`callbackIsPrefix`</SwmToken>, <SwmToken path="maintenance/createOAuthConsumer.php" pos="56:8:8" line-data="		$this-&gt;addOption( &#39;grants&#39;, &#39;Grants&#39;, true, true, false, true );">`grants`</SwmToken>, <SwmToken path="maintenance/createOAuthConsumer.php" pos="57:8:8" line-data="		$this-&gt;addOption( &#39;jsonOnSuccess&#39;, &#39;Output successful results as JSON&#39; );">`jsonOnSuccess`</SwmToken>, and <SwmToken path="maintenance/createOAuthConsumer.php" pos="58:8:8" line-data="		$this-&gt;addOption( &#39;approve&#39;, &#39;Accept the consumer&#39; );">`approve`</SwmToken>. It also ensures that the <SwmToken path="maintenance/createOAuthConsumer.php" pos="45:12:12" line-data="		$this-&gt;addDescription( &quot;Create an OAuth consumer&quot; );">`OAuth`</SwmToken> extension is required.

<SwmSnippet path="/maintenance/createOAuthConsumer.php" line="43">

---

The <SwmToken path="maintenance/createOAuthConsumer.php" pos="43:5:5" line-data="	public function __construct() {">`__construct`</SwmToken> method initializes the script with various options and ensures the <SwmToken path="maintenance/createOAuthConsumer.php" pos="45:12:12" line-data="		$this-&gt;addDescription( &quot;Create an OAuth consumer&quot; );">`OAuth`</SwmToken> extension is required.

```hack
	public function __construct() {
		parent::__construct();
		$this->addDescription( "Create an OAuth consumer" );
		$this->addOption( 'user', 'User to run the script as', true, true );
		$this->addOption( 'name', 'Application name', true, true );
		$this->addOption( 'description', 'Application description', true, true );
		$this->addOption( 'version', 'Application version', true, true );
		$this->addOption( 'callbackUrl', 'Callback URL', true, true );
		$this->addOption(
			'callbackIsPrefix',
			'Allow a consumer to specify a callback in requests',
			true
		);
		$this->addOption( 'grants', 'Grants', true, true, false, true );
		$this->addOption( 'jsonOnSuccess', 'Output successful results as JSON' );
		$this->addOption( 'approve', 'Accept the consumer' );
		$this->requireExtension( "OAuth" );
	}
```

---

</SwmSnippet>

# Execution

The <SwmToken path="maintenance/createOAuthConsumer.php" pos="62:5:5" line-data="	public function execute() {">`execute`</SwmToken> method handles the main logic for creating the <SwmToken path="maintenance/createOAuthConsumer.php" pos="45:12:12" line-data="		$this-&gt;addDescription( &quot;Create an OAuth consumer&quot; );">`OAuth`</SwmToken> consumer. It retrieves the user specified by the <SwmToken path="maintenance/createOAuthConsumer.php" pos="46:8:8" line-data="		$this-&gt;addOption( &#39;user&#39;, &#39;User to run the script as&#39;, true, true );">`user`</SwmToken> option and validates that the user is registered and has an email. The method then prepares the data required to propose a new <SwmToken path="maintenance/createOAuthConsumer.php" pos="45:12:12" line-data="		$this-&gt;addDescription( &quot;Create an OAuth consumer&quot; );">`OAuth`</SwmToken> consumer, including the name, version, description, callback URL, <SwmToken path="maintenance/createOAuthConsumer.php" pos="45:12:12" line-data="		$this-&gt;addDescription( &quot;Create an OAuth consumer&quot; );">`OAuth`</SwmToken> version, grants, and other necessary fields.

<SwmSnippet path="/maintenance/createOAuthConsumer.php" line="62">

---

The <SwmToken path="maintenance/createOAuthConsumer.php" pos="62:5:5" line-data="	public function execute() {">`execute`</SwmToken> method retrieves the user, validates the user, prepares the data, and submits the consumer data.

```hack
	public function execute() {
		$user = User::newFromName( $this->getOption( 'user' ) );
		if ( !$user->isNamed() ) {
			$this->fatalError( 'User must be registered' );
		}
		if ( $user->getEmail() === '' ) {
			$this->fatalError( 'User must have an email' );
		}

		$data = [
			'action' => 'propose',
			'name'         => $this->getOption( 'name' ),
			'version'      => $this->getOption( 'version' ),
			'description'  => $this->getOption( 'description' ),
			'callbackUrl'  => $this->getOption( 'callbackUrl' ),
			'oauthVersion' => 1,
			'callbackIsPrefix' => $this->hasOption( 'callbackIsPrefix' ),
			'grants' => '["' . implode( '","', $this->getOption( 'grants' ) ) . '"]',
			'granttype' => 'normal',
			'ownerOnly' => false,
			// Only support OAuth 1 for now, but that requires valid values for OAuth 2 fields
```

---

</SwmSnippet>

A <SwmToken path="maintenance/createOAuthConsumer.php" pos="23:6:6" line-data="use MediaWiki\Context\RequestContext;">`RequestContext`</SwmToken> is set with the user, and a database connection is obtained using <SwmToken path="maintenance/createOAuthConsumer.php" pos="97:6:8" line-data="		$dbw = Utils::getCentralDB( DB_PRIMARY );">`Utils::getCentralDB`</SwmToken>. The <SwmToken path="maintenance/createOAuthConsumer.php" pos="26:10:10" line-data="use MediaWiki\Extension\OAuth\Control\ConsumerSubmitControl;">`ConsumerSubmitControl`</SwmToken> is then used to submit the consumer data. If the submission is successful, the consumer is optionally approved if the <SwmToken path="maintenance/createOAuthConsumer.php" pos="58:8:8" line-data="		$this-&gt;addOption( &#39;approve&#39;, &#39;Accept the consumer&#39; );">`approve`</SwmToken> option is set. The script then outputs the result, either as JSON or in a readable format.

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](/)</sup></SwmMeta>
