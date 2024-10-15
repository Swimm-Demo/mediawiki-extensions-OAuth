---
title: Exploring Pagers in Frontend UI
---
# Introduction

This document will walk you through the implementation of the "Exploring Pagers in Frontend UI" feature.

The feature introduces a pager to manage <SwmToken path="/extension.json" pos="51:2:2" line-data="		&quot;OAuth&quot;: {">`OAuth`</SwmToken> grants in the frontend UI.

We will cover:

1. Why we extend <SwmToken path="/src/Frontend/Pagers/ManageMyGrantsPager.php" pos="34:6:6" line-data="class ManageMyGrantsPager extends ReverseChronologicalPager {">`ReverseChronologicalPager`</SwmToken>.
2. How we handle user permissions.
3. How we format and display the rows.
4. How we query the database.

# Extending <SwmToken path="/src/Frontend/Pagers/ManageMyGrantsPager.php" pos="34:6:6" line-data="class ManageMyGrantsPager extends ReverseChronologicalPager {">`ReverseChronologicalPager`</SwmToken>

<SwmSnippet path="/src/Frontend/Pagers/ManageMyGrantsPager.php" line="30">

---

We extend <SwmToken path="/src/Frontend/Pagers/ManageMyGrantsPager.php" pos="34:6:6" line-data="class ManageMyGrantsPager extends ReverseChronologicalPager {">`ReverseChronologicalPager`</SwmToken> to leverage its built-in functionality for paginating results in reverse chronological order. This is suitable for listing <SwmToken path="/extension.json" pos="51:2:2" line-data="		&quot;OAuth&quot;: {">`OAuth`</SwmToken> grants, which are time-sensitive.

```

/**
 * Query to list out consumers that have an access token for this user
 */
class ManageMyGrantsPager extends ReverseChronologicalPager {
	/** @var SpecialMWOAuthManageMyGrants */
	public $mForm;
	/** @var array */
	public $mConds;
```

---

</SwmSnippet>

# Constructor and conditions

<SwmSnippet path="/src/Frontend/Pagers/ManageMyGrantsPager.php" line="39">

---

The constructor initializes the pager with the form, conditions, and user ID. It also sets up the necessary conditions for querying the database.

```

	/**
	 * @param SpecialMWOAuthManageMyGrants $form
	 * @param array $conds
	 * @param int $centralUserId
	 */
	public function __construct( $form, $conds, $centralUserId ) {
		$this->mForm = $form;
		$this->mConds = $conds;
		$this->mConds[] = 'oaac_consumer_id = oarc_id';
		$this->mConds['oaac_user_id'] = $centralUserId;
```

---

</SwmSnippet>

# Handling user permissions

<SwmSnippet path="/src/Frontend/Pagers/ManageMyGrantsPager.php" line="50">

---

We check if the user has the right to view suppressed grants. If not, we add a condition to exclude deleted grants.

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

# Setting the limit

<SwmSnippet path="/src/Frontend/Pagers/ManageMyGrantsPager.php" line="58">

---

We set the default limit to 20 entries, as each entry takes up multiple rows. This ensures the pager does not overload the UI with too many entries at once.

```

		# Treat 20 as the default limit, since each entry takes up 5 rows.
		$urlLimit = $this->mRequest->getInt( 'limit' );
		$this->mLimit = $urlLimit ?: 20;
	}

	/**
	 * @return Title
	 */
	public function getTitle() {
		return $this->mForm->getFullTitle();
	}
```

---

</SwmSnippet>

# Formatting rows

<SwmSnippet path="/src/Frontend/Pagers/ManageMyGrantsPager.php" line="70">

---

The <SwmToken path="/src/Frontend/Pagers/ManageMyGrantsPager.php" pos="75:5:5" line-data="	public function formatRow( $row ) {">`formatRow`</SwmToken> method delegates the formatting to the form object, ensuring consistency in how rows are displayed.

```

	/**
	 * @param stdClass $row
	 * @return string
	 */
	public function formatRow( $row ) {
		return $this->mForm->formatRow( $this->mDb, $row );
	}
```

---

</SwmSnippet>

# Generating the body

<SwmSnippet path="/src/Frontend/Pagers/ManageMyGrantsPager.php" line="78">

---

The <SwmToken path="/src/Frontend/Pagers/ManageMyGrantsPager.php" pos="82:5:5" line-data="	public function getStartBody() {">`getStartBody`</SwmToken> and <SwmToken path="/src/Frontend/Pagers/ManageMyGrantsPager.php" pos="93:5:5" line-data="	public function getEndBody() {">`getEndBody`</SwmToken> methods wrap the list of grants in HTML <SwmToken path="/src/Frontend/Pagers/ManageMyGrantsPager.php" pos="84:4:6" line-data="			return &#39;&lt;ul&gt;&#39;;">`<ul>`</SwmToken> tags if there are any rows to display.

```

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
```

---

</SwmSnippet>

# Querying the database

<SwmSnippet path="/src/Frontend/Pagers/ManageMyGrantsPager.php" line="100">

---

The <SwmToken path="/src/Frontend/Pagers/ManageMyGrantsPager.php" pos="104:5:5" line-data="	public function getQueryInfo() {">`getQueryInfo`</SwmToken> method specifies the tables, fields, and conditions for the database query. This is crucial for retrieving the correct data.

```

	/**
	 * @return array
	 */
	public function getQueryInfo() {
		return [
			'tables' => [ 'oauth_accepted_consumer', 'oauth_registered_consumer' ],
			'fields' => [ '*' ],
			'conds'  => $this->mConds
		];
	}
```

---

</SwmSnippet>

# Index field

<SwmSnippet path="/src/Frontend/Pagers/ManageMyGrantsPager.php" line="111">

---

The <SwmToken path="/src/Frontend/Pagers/ListConsumersPager.php" pos="129:5:5" line-data="	public function getIndexField() {">`getIndexField`</SwmToken> method returns the field used to index the results, which is necessary for the pager to function correctly.

```

	/**
	 * @return string
	 */
	public function getIndexField() {
		return 'oaac_consumer_id';
	}
}
```

---

</SwmSnippet>

This implementation ensures that the pager is efficient, user-permission aware, and consistent in formatting and querying data.

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
