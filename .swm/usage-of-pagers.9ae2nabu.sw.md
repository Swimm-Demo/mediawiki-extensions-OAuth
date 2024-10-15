---
title: Usage of Pagers
---

Pagers are used to handle the display of large sets of data in a paginated format. This helps in managing and navigating through data efficiently without overwhelming the user with too much information at once.

There are multiple pagers used in this codebase. Here is an example:

# <SwmToken path="/src/Frontend/SpecialPages/SpecialMWOAuthListConsumers.php" pos="238:8:8" line-data="		$pager = new ListConsumersPager( $this, [], $name, $centralId, $stage );">`ListConsumersPager`</SwmToken> construction

<SwmSnippet path="/src/Frontend/Pagers/ListConsumersPager.php" line="34">

---

The <SwmToken path="/src/Frontend/SpecialPages/SpecialMWOAuthListConsumers.php" pos="238:8:8" line-data="		$pager = new ListConsumersPager( $this, [], $name, $centralId, $stage );">`ListConsumersPager`</SwmToken> class is a subclass of <SwmToken path="/src/Frontend/Pagers/ListConsumersPager.php" pos="34:6:6" line-data="class ListConsumersPager extends AlphabeticPager {">`AlphabeticPager`</SwmToken> and represents a pager for listing consumers. It provides functionality for pagination and sorting consumers in alphabetic order.

```hack
class ListConsumersPager extends AlphabeticPager {
```

---

</SwmSnippet>

<SwmSnippet path="/src/Frontend/Pagers/ListConsumersPager.php" line="44">

---

The constructor sets up the initial conditions and determines the index field based on the provided parameters.

```

		$indexField = null;
		if ( $name !== '' ) {
			$this->mConds['oarc_name'] = $name;
			$indexField = 'oarc_id';
		}
		if ( $centralUserID !== null ) {
			$this->mConds['oarc_user_id'] = $centralUserID;
			$indexField = 'oarc_id';
		}
		if ( $stage >= 0 ) {
			$this->mConds['oarc_stage'] = $stage;
			if ( !$indexField ) {
				$indexField = 'oarc_stage_timestamp';
			}
		}
		if ( !$indexField ) {
			$indexField = 'oarc_id';
		}
		$this->mIndexField = $indexField;
```

---

</SwmSnippet>

<SwmSnippet path="/src/Frontend/Pagers/ListConsumersPager.php" line="64">

---

It also checks user permissions and sets up the database connection.

```

		$permissionManager = MediaWikiServices::getInstance()->getPermissionManager();
		if ( !$permissionManager->userHasRight( $this->getUser(), 'mwoauthviewsuppressed' ) ) {
			$this->mConds['oarc_deleted'] = 0;
		}

		$this->mDb = Utils::getCentralDB( DB_REPLICA );
		parent::__construct();
```

---

</SwmSnippet>

<SwmSnippet path="/src/Frontend/Pagers/ListConsumersPager.php" line="72">

---

Finally, it sets a default limit for the number of entries displayed per page.

```

		# Treat 20 as the default limit, since each entry takes up 5 rows.
		$urlLimit = $this->mRequest->getInt( 'limit' );
		$this->mLimit = $urlLimit ?: 20;
	}
```

---

</SwmSnippet>

# <SwmToken path="/src/Frontend/SpecialPages/SpecialMWOAuthListConsumers.php" pos="238:8:8" line-data="		$pager = new ListConsumersPager( $this, [], $name, $centralId, $stage );">`ListConsumersPager`</SwmToken> usage

<SwmSnippet path="/src/Frontend/SpecialPages/SpecialMWOAuthConsumerRegistration.php" line="289">

---

Here we see an usage example of the <SwmToken path="/src/Frontend/SpecialPages/SpecialMWOAuthListConsumers.php" pos="238:8:8" line-data="		$pager = new ListConsumersPager( $this, [], $name, $centralId, $stage );">`ListConsumersPager`</SwmToken>.&nbsp;

This code snippet displays a list of consumers. If there are consumers, it adds navigation bar and body to the output. If there are no consumers, it adds a wiki message. Additionally, it prunes old deleted items every 30th view. If none of the cases match, it adds a default wiki message to the output.

```hack
			case 'list':
				$pager = new ListMyConsumersPager( $this, [], $centralUserId );
				if ( $pager->getNumRows() ) {
					$this->getOutput()->addHTML( $pager->getNavigationBar() );
					$this->getOutput()->addHTML( $pager->getBody() );
					$this->getOutput()->addHTML( $pager->getNavigationBar() );
				} else {
					$this->getOutput()->addWikiMsg( "mwoauthconsumerregistration-none" );
				}
				# Every 30th view, prune old deleted items
				if ( mt_rand( 0, 29 ) == 0 ) {
					Utils::runAutoMaintenance( Utils::getCentralDB( DB_PRIMARY ) );
				}
				break;
			default:
				$this->getOutput()->addWikiMsg( 'mwoauthconsumerregistration-maintext' );
		}
```

---

</SwmSnippet>

&nbsp;

_This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human_

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
