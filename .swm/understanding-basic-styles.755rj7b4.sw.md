---
title: Understanding Basic Styles
---
# Understanding Basic Styles

Basic Styles define the foundational visual elements for the <SwmToken path="resources/modules/ext.MWOAuth.BasicStyles.less" pos="60:8:8" line-data=".mw-htmlform .mw-oauth-form-ignorewarnings-hidden {">`oauth`</SwmToken> extension. These styles ensure a consistent look and feel across different components.

<SwmSnippet path="/resources/modules/ext.MWOAuth.BasicStyles.less" line="1">

---

## Consistent Look and Feel

The file <SwmPath>[resources/modules/ext.MWOAuth.BasicStyles.less](resources/modules/ext.MWOAuth.BasicStyles.less)</SwmPath> imports variables from <SwmToken path="resources/modules/ext.MWOAuth.BasicStyles.less" pos="1:4:10" line-data="@import &#39;mediawiki.skin.variables.less&#39;;">`mediawiki.skin.variables.less`</SwmToken> to maintain consistency with the overall <SwmToken path="resources/modules/ext.MWOAuth.BasicStyles.less" pos="1:4:4" line-data="@import &#39;mediawiki.skin.variables.less&#39;;">`mediawiki`</SwmToken> skin. Specific classes such as <SwmToken path="resources/modules/ext.MWOAuth.BasicStyles.less" pos="3:0:5" line-data=".mw-mwoauthconsumerregistration-body,">`.mw-mwoauthconsumerregistration-body`</SwmToken> and <SwmToken path="resources/modules/ext.MWOAuth.BasicStyles.less" pos="4:0:5" line-data=".mw-mwoauthmanageconsumers-body {">`.mw-mwoauthmanageconsumers-body`</SwmToken> are styled with background colors to indicate different states.

```less
@import 'mediawiki.skin.variables.less';

.mw-mwoauthconsumerregistration-body,
.mw-mwoauthmanageconsumers-body {
	background-color: @background-color-notice-subtle;
}
```

---

</SwmSnippet>

## Enhancing Readability and User Experience

Additional styles are applied to elements like list items, error details, and grant groups to enhance readability and user experience.

<SwmSnippet path="/resources/modules/ext.MWOAuth.BasicStyles.less" line="32">

---

Styles for elements like list items, error details, and grant groups are defined to improve readability and user experience.

```less
.mw-mwoauthmanagemygrants-list-item {
	margin-bottom: 1em;
}

.mw-mwoautherror-details {
	color: @color-disabled;
	font-size: 0.7em;
}

span.mw-grantgroup {
	font-weight: bold;
}
```

---

</SwmSnippet>

## Overriding Conflicting Styles

Some styles require extra specificity to override conflicting styles from other libraries, ensuring that the intended design is preserved.

<SwmSnippet path="/resources/modules/ext.MWOAuth.BasicStyles.less" line="59">

---

Extra specificity is added to some styles to override conflicting styles from other libraries, ensuring the intended design is preserved.

```less
// need extra specificity because of some conflicting OOUI styles
.mw-htmlform .mw-oauth-form-ignorewarnings-hidden {
	display: none;

	#oauth-form-with-warnings& {
		display: block;
	}
}
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](/)</sup></SwmMeta>
