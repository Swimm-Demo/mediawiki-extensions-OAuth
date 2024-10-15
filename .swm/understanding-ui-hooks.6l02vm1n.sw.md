---
title: Understanding UI Hooks
---

# Introduction

This document will walk you through the implementation of the <SwmToken path="/src/Frontend/UIHooks.php" pos="34:2:2" line-data="class UIHooks implements">`UIHooks`</SwmToken> class in <SwmPath>[src/Frontend/UIHooks.php](/src/Frontend/UIHooks.php)</SwmPath>.

The <SwmToken path="/src/Frontend/UIHooks.php" pos="34:2:2" line-data="class UIHooks implements">`UIHooks`</SwmToken> class handles various UI-related hooks for an `OAuth` environment in `MediaWiki`. It integrates with several `MediaWiki` hooks to customize user preferences, manage special pages, and handle messages.

We will cover:

1. The purpose of the <SwmToken path="/src/Frontend/UIHooks.php" pos="34:2:2" line-data="class UIHooks implements">`UIHooks`</SwmToken> class.
2. Methods in the <SwmToken path="/src/Frontend/UIHooks.php" pos="34:2:2" line-data="class UIHooks implements">`UIHooks`</SwmToken> class

# Purpose of the <SwmToken path="/src/Frontend/UIHooks.php" pos="34:2:2" line-data="class UIHooks implements">`UIHooks`</SwmToken> class

<SwmSnippet path="/src/Frontend/UIHooks.php" line="28">

---

The <SwmToken path="/src/Frontend/UIHooks.php" pos="34:2:2" line-data="class UIHooks implements">`UIHooks`</SwmToken> class is designed to handle various GUI event hooks in an `OAuth` environment. It implements several `MediaWiki` hook interfaces to customize and extend the functionality of the `MediaWiki` UI.

```

/**
 * Class containing GUI even handler functions for an OAuth environment
 *
 * @phpcs:disable MediaWiki.NamingConventions.LowerCamelFunctionsName.FunctionName
 */
class UIHooks implements
	GetPreferencesHook,
	LoginFormValidErrorMessagesHook,
	MessagesPreLoadHook,
	SpecialPageAfterExecuteHook,
	SpecialPageBeforeFormDisplayHook,
	SpecialPage_initListHook
{
```

---

</SwmSnippet>

# Method Implementation

## Customizing user preferences

<SwmSnippet path="/src/Frontend/UIHooks.php" line="52">

---

The <SwmToken path="/src/Frontend/UIHooks.php" pos="59:5:5" line-data="	public function onGetPreferences( $user, &amp;$preferences ) {">`onGetPreferences`</SwmToken> method customizes user preferences by adding a button to manage <SwmToken path="/src/Frontend/UIHooks.php" pos="30:19:19" line-data=" * Class containing GUI even handler functions for an OAuth environment">`OAuth`</SwmToken> grants. It checks user permissions and retrieves the count of accepted consumers.

```

	/**
	 * @param User $user
	 * @param array &$preferences
	 * @return bool
	 * @throws MWException
	 */
	public function onGetPreferences( $user, &$preferences ) {
		$dbr = Utils::getCentralDB( DB_REPLICA );
		$conds = [
			'oaac_user_id' => Utils::getCentralIdFromLocalUser( $user ),
		];
```

---

</SwmSnippet>

<SwmSnippet path="/src/Frontend/UIHooks.php" line="64">

---

If the user does not have the <SwmToken path="/src/Frontend/UIHooks.php" pos="65:18:18" line-data="		if ( !$this-&gt;permissionManager-&gt;userHasRight( $user, &#39;mwoauthviewsuppressed&#39; ) ) {">`mwoauthviewsuppressed`</SwmToken> right, it filters out deleted consumers.

```

		if ( !$this->permissionManager->userHasRight( $user, 'mwoauthviewsuppressed' ) ) {
			$conds['oarc_deleted'] = 0;
		}
		$count = $dbr->newSelectQueryBuilder()
			->select( 'COUNT(*)' )
			->from( 'oauth_accepted_consumer' )
			->join( 'oauth_registered_consumer', null, 'oaac_consumer_id = oarc_id' )
			->where( $conds )
			->caller( __METHOD__ )
			->fetchField();
```

---

</SwmSnippet>

<SwmSnippet path="/src/Frontend/UIHooks.php" line="75">

---

A button widget is created with a link to the <SwmToken path="/src/Frontend/UIHooks.php" pos="77:13:13" line-data="			&#39;href&#39; =&gt; SpecialPage::getTitleFor( &#39;OAuthManageMyGrants&#39; )-&gt;getLinkURL(),">`OAuthManageMyGrants`</SwmToken> special page, and this button is added to the user's preferences.

```

		$control = new ButtonWidget( [
			'href' => SpecialPage::getTitleFor( 'OAuthManageMyGrants' )->getLinkURL(),
			'label' => wfMessage( 'mwoauth-prefs-managegrantslink' )->numParams( $count )->text()
		] );

		$prefInsert = [ 'mwoauth-prefs-managegrants' =>
			[
				'section' => 'personal/info',
				'label-message' => 'mwoauth-prefs-managegrants',
				'type' => 'info',
				'raw' => true,
				'default' => (string)$control
			],
		];
```

---

</SwmSnippet>

<SwmSnippet path="/src/Frontend/UIHooks.php" line="90">

---

The preferences are then updated with the new button.

```

		if ( array_key_exists( 'usergroups', $preferences ) ) {
			$preferences = wfArrayInsertAfter( $preferences, $prefInsert, 'usergroups' );
		} else {
			$preferences += $prefInsert;
		}

		return true;
	}
```

---

</SwmSnippet>

## Preloading and modifying messages

<SwmSnippet path="/src/Frontend/UIHooks.php" line="99">

---

The <SwmToken path="/src/Frontend/UIHooks.php" pos="107:5:5" line-data="	public function onMessagesPreLoad( $title, &amp;$message, $code ) {">`onMessagesPreLoad`</SwmToken> method overrides the <SwmToken path="/src/Frontend/UIHooks.php" pos="101:5:5" line-data="	 * Override MediaWiki namespace for a message">`MediaWiki`</SwmToken> namespace for specific messages related to <SwmToken path="/src/Frontend/UIHooks.php" pos="30:19:19" line-data=" * Class containing GUI even handler functions for an OAuth environment">`OAuth`</SwmToken> consumers. It performs quick and expensive checks to determine if the message should be modified.

```

	/**
	 * Override MediaWiki namespace for a message
	 * @param string $title Message name (no prefix)
	 * @param string &$message Message wikitext
	 * @param string $code Language code
	 * @return bool false if we replaced $message
	 */
	public function onMessagesPreLoad( $title, &$message, $code ) {
		// Quick fail check
		if ( substr( $title, 0, 15 ) !== 'Tag-OAuth_CID:_' ) {
			return true;
		}
```

---

</SwmSnippet>

<SwmSnippet path="/src/Frontend/UIHooks.php" line="112">

---

If the message matches the criteria, it sets the correct language context and retrieves the consumer information.

```

		// More expensive check
		if ( !preg_match( '!^Tag-OAuth_CID:_(\d+)((?:-description)?)(?:/|$)!', $title, $m ) ) {
			return true;
		}

		// Put the correct language in the context, so that later uses of $context->msg() will use it
		$context = new DerivativeContext( RequestContext::getMain() );
		$context->setLanguage( $code );
```

---

</SwmSnippet>

<SwmSnippet path="/src/Frontend/UIHooks.php" line="121">

---

It then updates the message with either the consumer description or a link to the consumer's details.

```

		$dbr = Utils::getCentralDB( DB_REPLICA );
		$cmrAc = ConsumerAccessControl::wrap(
			Consumer::newFromId( $dbr, (int)$m[1] ),
			$context
		);
		if ( !$cmrAc ) {
			// Invalid consumer, skip it
			return true;
		}

		if ( $m[2] ) {
			$message = $cmrAc->escapeForWikitext( $cmrAc->getDescription() );
		} else {
			$target = SpecialPage::getTitleFor( 'OAuthListConsumers',
				'view/' . $cmrAc->getConsumerKey()
			);
			$encName = $cmrAc->escapeForWikitext( $cmrAc->getNameAndVersion() );
			$message = "[[$target|$encName]]";
		}
		return false;
	}
```

---

</SwmSnippet>

## Managing special pages

<SwmSnippet path="/src/Frontend/UIHooks.php" line="143">

---

The <SwmToken path="/src/Frontend/UIHooks.php" pos="150:5:5" line-data="	public function onSpecialPageAfterExecute( $special, $par ) {">`onSpecialPageAfterExecute`</SwmToken> method appends <SwmToken path="/src/Frontend/UIHooks.php" pos="145:5:7" line-data="	 * Append OAuth-specific grants to Special:ListGrants">`OAuth-specific`</SwmToken> grants to the <SwmToken path="/src/Frontend/UIHooks.php" pos="145:13:15" line-data="	 * Append OAuth-specific grants to Special:ListGrants">`Special:ListGrants`</SwmToken> page. It adds a summary message and constructs an HTML table with grant information.

```

	/**
	 * Append OAuth-specific grants to Special:ListGrants
	 * @param SpecialPage $special
	 * @param string $par
	 * @return bool
	 */
	public function onSpecialPageAfterExecute( $special, $par ) {
		if ( $special->getName() !== 'Listgrants' ) {
			return true;
		}

		$out = $special->getOutput();

		$out->addWikiMsg( 'mwoauth-listgrants-extra-summary' );

		$out->addHTML(
			Html::openElement( 'table',
			[ 'class' => 'wikitable mw-listgrouprights-table' ] ) .
			'<tr>' .
			Html::element( 'th', [], $special->msg( 'listgrants-grant' )->text() ) .
			Html::element( 'th', [], $special->msg( 'listgrants-rights' )->text() ) .
			'</tr>'
		);

		$grants = [
			'mwoauth-authonly' => [],
			'mwoauth-authonlyprivate' => [],
		];

		foreach ( $grants as $grant => $rights ) {
			$descs = [];
			$rights = array_filter( $rights );
			foreach ( $rights as $permission => $granted ) {
				$descs[] = $special->msg(
					'listgrouprights-right-display',
					User::getRightDescription( $permission ),
					'<span class="mw-listgrants-right-name">' . $permission . '</span>'
				)->parse();
			}
			if ( !count( $descs ) ) {
				$grantCellHtml = '';
			} else {
				sort( $descs );
				$grantCellHtml = '<ul><li>' . implode( "</li>\n<li>", $descs ) . '</li></ul>';
			}

			$id = Sanitizer::escapeIdForAttribute( $grant );
			$out->addHTML( Html::rawElement( 'tr', [ 'id' => $id ],
				"<td>" . $special->msg( "grant-$grant" )->escaped() . "</td>" .
				"<td>" . $grantCellHtml . '</td>'
			) );
		}

		$out->addHTML( Html::closeElement( 'table' ) );

		return true;
	}

	/**
	 * Add additional text to Special:BotPasswords
	 * @param string $name Special page name
	 * @param HTMLForm $form
	 * @return bool
	 */
	public function onSpecialPageBeforeFormDisplay( $name, $form ) {
		global $wgMWOAuthCentralWiki;
```

---

</SwmSnippet>

<SwmSnippet path="/src/Frontend/UIHooks.php" line="210">

---

The <SwmToken path="/src/Frontend/UIHooks.php" pos="208:5:5" line-data="	public function onSpecialPageBeforeFormDisplay( $name, $form ) {">`onSpecialPageBeforeFormDisplay`</SwmToken> method adds additional text to the <SwmToken path="/src/Frontend/UIHooks.php" pos="203:11:13" line-data="	 * Add additional text to Special:BotPasswords">`Special:BotPasswords`</SwmToken> page, providing a link to the <SwmToken path="/src/Frontend/UIHooks.php" pos="30:19:19" line-data=" * Class containing GUI even handler functions for an OAuth environment">`OAuth`</SwmToken> consumer registration page.

```

		if ( $name === 'BotPasswords' ) {
			if ( Utils::isCentralWiki() ) {
				$url = SpecialPage::getTitleFor( 'OAuthConsumerRegistration' )->getFullURL();
			} else {
				$url = WikiMap::getForeignURL(
					$wgMWOAuthCentralWiki,
					// Cross-wiki, so don't localize
					'Special:OAuthConsumerRegistration'
				);
			}
			$form->addPreHtml( $form->msg( 'mwoauth-botpasswords-note', $url )->parseAsBlock() );
		}
		return true;
	}
```

---

</SwmSnippet>

<SwmSnippet path="/src/Frontend/UIHooks.php" line="255">

---

The <SwmToken path="/src/Frontend/UIHooks.php" pos="262:5:5" line-data="	public function onSpecialPage_initList( &amp;$specialPages ) {">`onSpecialPage_initList`</SwmToken> method initializes special pages related to <SwmToken path="/src/Frontend/UIHooks.php" pos="256:20:20" line-data="		$icons[&#39;oauth&#39;] = [ &#39;path&#39; =&gt; &#39;OAuth/resources/assets/echo-icon.png&#39; ];">`OAuth`</SwmToken> consumer registration and management.

```

		$icons['oauth'] = [ 'path' => 'OAuth/resources/assets/echo-icon.png' ];
	}

	/**
	 * @param array &$specialPages
	 */
	public function onSpecialPage_initList( &$specialPages ) {
		if ( Utils::isCentralWiki() ) {
			$specialPages['OAuthConsumerRegistration'] = [
				'class' => SpecialMWOAuthConsumerRegistration::class,
				'services' => [
					'PermissionManager',
					'GrantsInfo',
					'GrantsLocalization',
				],
			];
			$specialPages['OAuthManageConsumers'] = [
				'class' => SpecialMWOAuthManageConsumers::class,
				'services' => [
					'GrantsLocalization',
				],
			];
		}
	}
```

---

</SwmSnippet>

## Creating notifications

<SwmSnippet path="/src/Frontend/UIHooks.php" line="225">

---

The <SwmToken path="/src/Frontend/UIHooks.php" pos="231:7:7" line-data="	public static function onBeforeCreateEchoEvent(">`onBeforeCreateEchoEvent`</SwmToken> method defines notifications for various OAuth-related events. It sets up notification categories and icons, and registers notifications for different <SwmToken path="/src/Frontend/UIHooks.php" pos="256:20:20" line-data="		$icons[&#39;oauth&#39;] = [ &#39;path&#39; =&gt; &#39;OAuth/resources/assets/echo-icon.png&#39; ];">`OAuth`</SwmToken> actions.

```

	/**
	 * @param array &$notifications
	 * @param array &$notificationCategories
	 * @param array &$icons
	 */
	public static function onBeforeCreateEchoEvent(
		&$notifications, &$notificationCategories, &$icons
	) {
		global $wgOAuthGroupsToNotify;

		if ( !Utils::isCentralWiki() ) {
			return;
		}

		$notificationCategories['oauth-owner'] = [
			'tooltip' => 'echo-pref-tooltip-oauth-owner',
		];
		$notificationCategories['oauth-admin'] = [
			'tooltip' => 'echo-pref-tooltip-oauth-admin',
			'usergroups' => $wgOAuthGroupsToNotify,
		];

		foreach ( ConsumerSubmitControl::$actions as $eventName ) {
			// oauth-app-propose and oauth-app-update notifies admins of the app.
			// oauth-app-approve, oauth-app-reject, oauth-app-disable and oauth-app-reenable
			// notify owner of the change.
			$notifications["oauth-app-$eventName"] =
				EchoOAuthStageChangePresentationModel::getDefinition( $eventName );
		}

		$icons['oauth'] = [ 'path' => 'OAuth/resources/assets/echo-icon.png' ];
	}

	/**
	 * @param array &$specialPages
	 */
	public function onSpecialPage_initList( &$specialPages ) {
		if ( Utils::isCentralWiki() ) {
			$specialPages['OAuthConsumerRegistration'] = [
				'class' => SpecialMWOAuthConsumerRegistration::class,
				'services' => [
					'PermissionManager',
					'GrantsInfo',
					'GrantsLocalization',
				],
			];
			$specialPages['OAuthManageConsumers'] = [
				'class' => SpecialMWOAuthManageConsumers::class,
				'services' => [
					'GrantsLocalization',
				],
			];
		}
	}
```

---

</SwmSnippet>

## Handling login form error messages

<SwmSnippet path="/src/Frontend/UIHooks.php" line="280">

---

The <SwmToken path="/src/Frontend/UIHooks.php" pos="286:5:5" line-data="	public function onLoginFormValidErrorMessages( &amp;$messages ) {">`onLoginFormValidErrorMessages`</SwmToken> method adds specific error messages to the login form, informing users about OAuth-related requirements.

```

	/**
	 * Show help text when a user is redirected to provider login page
	 * @param array &$messages
	 * @return bool
	 */
	public function onLoginFormValidErrorMessages( &$messages ) {
		$messages = array_merge( $messages, [
			'mwoauth-named-account-required-reason',
			'mwoauth-named-account-required-reason-for-temp-user',
			'mwoauth-available-only-to-registered',
		] );
		return true;
	}
}
```

---

</SwmSnippet>

&nbsp;

_This is an auto-generated document by Swimm 🌊 and has not yet been verified by a human_

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](https://app.swimm.io/)</sup></SwmMeta>
