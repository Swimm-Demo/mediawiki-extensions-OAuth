---
title: Languages Overview
---
```mermaid
graph TD;
    A[Languages Overview] --> B[Language Translations];
    B --> C[JSON Files in i18n Directory];
    C --> D[Key-Value Pairs];
    D --> E[Localized User Interfaces];
    E --> F[Examples];
    F --> G[Spanish Translation];
    F --> H[English (GB) Translation];
    F --> I[English (US) Translation];
    F --> J[Portuguese Translation];
    F --> K[Brazilian Portuguese Translation];
```

# Languages Overview

Languages refer to the various language translations available for the <SwmToken path="i18n/es.json" pos="241:24:24" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`OAuth`</SwmToken> extension. These translations are stored in JSON files within the `i18n` directory. Each JSON file corresponds to a specific language or dialect, identified by its language code. These files contain key-value pairs where the key is the message identifier and the value is the translated message. The purpose of these translations is to provide localized user interfaces for different language speakers. This allows users from various linguistic backgrounds to interact with the <SwmToken path="i18n/es.json" pos="241:24:24" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`OAuth`</SwmToken> extension in their native language.

<SwmSnippet path="/i18n/es.json" line="241">

---

## Example of Language Translation

This line shows a Spanish translation for a reserved tag message.

```json
	"mwoauth-tag-reserved": "Las etiquetas que comienzan con <code>OAuth CID:</code> están reservadas para que las use OAuth.",
```

---

</SwmSnippet>

<SwmSnippet path="/i18n/en-gb.json" line="13">

---

## English (GB) Translation Example

These lines provide English (GB) translations for various OAuth-related messages.

```json
	"mwoauth-consumer-owner-only-help": "Selecting this option will cause the consumer to be automatically approved and accepted for use by $1. It will not be usable by any other user, and the usual authorisation flow will not function. Actions taken using this consumer will not be tagged.",
	"mwoauthconsumerregistration-propose-text-oauth1": "Developers should use the form below to propose a new OAuth 1.0a consumer (see the [https://www.mediawiki.org/wiki/Special:MyLanguage/Extension:OAuth extension documentation] for more details). After submitting this form, you will receive a token that your application will use to identify itself to MediaWiki. Depending on what capabilities you request, an OAuth administrator might need to approve your application before it can be authorised by other users.\n\nA few recommendations and remarks:\n* Try to use as few grants as possible. Avoid grants that are not actually needed now.\n* Versions are of the form \"major.minor.release\" (the last two being optional) and increase as grant changes are needed.\n* Please provide a public RSA key (in PEM format) if possible; otherwise a (less secure) secret token will have to be used.\n* You can use a project ID to restrict the consumer to a single project on this site (use \"*\" for all projects).",
	"mwoauthconsumerregistration-propose-text-oauth2": "Developers should use the form below to request a token for a new OAuth 2.0 client (see the [https://www.mediawiki.org/wiki/Special:MyLanguage/Extension:OAuth extension documentation] for more details). After submitting this form, you will receive a token that your application will use to identify itself to MediaWiki. Depending on what capabilities you request, an OAuth administrator might need to approve your application before it can be authorised by other users.\n\nA few recommendations and remarks:\n* Try to use as few scopes as possible. Avoid scopes that are not actually needed now.\n* Versions are of the form \"major.minor.release\" (the last two being optional) and increase as scope changes are needed.\n* You can use a project ID to restrict the consumer to a single project on this site (use \"*\" for all projects).",
	"mwoauthmanagemygrants-text": "This page lists any applications that can use your account. For any such application, the scope of its access is limited by the permissions that you granted to the application when you authorised it to act on your behalf. If you separately authorised an application to access different \"sister\" projects on your behalf, then you will see separate configuration for each such project below.\n\nConnected applications access your account by using the OAuth protocol. <span class=\"plainlinks\">([https://www.mediawiki.org/wiki/Special:MyLanguage/Help:OAuth Learn more about connected applications])</span>",
```

---

</SwmSnippet>

<SwmSnippet path="/i18n/en.json" line="33">

---

## English (US) Translation Example

These lines provide English (US) translations for various OAuth-related messages.

```json
	"mwoauth-consumer-owner-only": "This consumer is for use only by $1.",
	"mwoauth-consumer-owner-only-help": "Selecting this option will cause the consumer to be automatically approved and accepted for use by $1. It will not be usable by any other user, and the usual authorization flow will not function. Actions taken using this consumer will not be tagged.",
	"mwoauth-consumer-description": "Application description:",
	"mwoauth-consumer-callbackurl": "OAuth \"callback\" URL:",
	"mwoauth-consumer-callbackurl-help": "Unlike OAuth 1.0a, this URL is exactly matched",
	"mwoauth-consumer-callbackurl-warning": "(wildcard port)",
	"mwoauth-consumer-callbackisprefix": "Allow consumer to specify a callback in requests and use \"callback\" URL above as a required prefix.",
	"mwoauth-consumer-granttypes": "Types of grants being requested:",
	"mwoauth-consumer-grantsneeded": "Applicable grants:",
	"mwoauth-consumer-required-grant": "Applicable to consumer",
	"mwoauth-consumer-wiki": "Applicable project:",
	"mwoauth-consumer-wiki-thiswiki": "Current project ($1)",
	"mwoauth-consumer-restrictions": "Usage restrictions:",
	"mwoauth-consumer-restrictions-json": "Usage restrictions (JSON):",
	"mwoauth-consumer-rsakey": "Public RSA key (optional):",
	"mwoauth-consumer-rsakey-help": "Enter a public key to use the RSA-SHA1 signature method. Leave empty to use HMAC-SHA1 with a random secret. If you are not sure which, leave it empty.",
	"mwoauth-consumer-secretkey": "Consumer secret token:",
	"mwoauth-consumer-accesstoken": "Access token:",
	"mwoauth-consumer-reason": "Reason:",
	"mwoauth-consumer-developer-agreement": "By submitting this application, you acknowledge that we reserve the right to disable your application, remove or restrict you or your application's access to this site, and pursue any other course of action we deem appropriate if we believe, in our sole judgment, that you or your application are violating any policy, guideline, and guiding principle of the this site. We can change this Application Policy at any time without prior notice, at our sole discretion and as we deem necessary. Your continued use of OAuth constitutes acceptance of those changes.",
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](/)</sup></SwmMeta>
