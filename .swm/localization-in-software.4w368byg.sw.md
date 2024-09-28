---
title: Localization in Software
---
```mermaid
graph TD;
    A[Software] --> B[Localization];
    B --> C[Translation];
    B --> D[Adaptation];
    C --> E[JSON Files];
    E --> F[Different Languages];
    F --> G[User Interface];
    F --> H[Messages];
    G --> I[Spanish];
    G --> J[English];
    G --> K[Portuguese];
    G --> L[British English];
    G --> M[Brazilian Portuguese];
```

# Understanding Localization in Languages

Localization refers to the adaptation of software to different languages and regions. It involves translating the user interface and messages into various languages to make the software accessible to a global audience.

Localization is important for improving user experience and making the software more inclusive. By supporting multiple languages, the software can reach a wider audience and cater to the needs of users from diverse regions.

<SwmSnippet path="/i18n/es.json" line="241">

---

# Example Translations

This file contains translations for Spanish. For example, the string <SwmToken path="i18n/es.json" pos="241:2:6" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`mwoauth-tag-reserved`</SwmToken> is translated to <SwmToken path="i18n/es.json" pos="241:11:44" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`Las etiquetas que comienzan con <code>OAuth CID:</code> están reservadas para que las use OAuth.`</SwmToken>

```json
	"mwoauth-tag-reserved": "Las etiquetas que comienzan con <code>OAuth CID:</code> están reservadas para que las use OAuth.",
```

---

</SwmSnippet>

<SwmSnippet path="/i18n/qqq.json" line="52">

---

The <SwmPath>[i18n/qqq.json](i18n/qqq.json)</SwmPath> file provides descriptions and usage notes for each translatable string, which helps translators understand the context and purpose of the strings.

```json
	"mwoauth-consumer-callbackisprefix": "Used as a label for the check box where user can decide if their consumer should use \"Callback URL\" as a string prefix (checked), or if the consumer cannot customize the callback URL in its requests as is required to specify \"oob\" (unchecked, default).",
	"mwoauth-consumer-granttypes": "Used as label to select between authorization-only (with or without private info) and normal API access",
	"mwoauth-consumer-grantsneeded": "Used as label.\n\nFollowed by the list of grants.\n{{Identical|Applicable grant}}",
	"mwoauth-consumer-required-grant": "Used as table column header.",
	"mwoauth-consumer-wiki": "Used as label for the input box. The default value for the input box is \"*\".\n{{Identical|Applicable project}}",
	"mwoauth-consumer-wiki-thiswiki": "Label for selection-list option, indicating the wiki this user is currently visiting.\n\nParameters:\n* $1 - wiki ID",
	"mwoauth-consumer-restrictions": "Used as label for the textarea. (The value is written in JSON format.)\n\nFollowed by the textarea or the message {{msg-mw|Mwoauthmanageconsumers-field-hidden}}.\n{{Identical|Usage restriction}}",
	"mwoauth-consumer-restrictions-json": "Used as label for the \"Restrictions\" textarea.\n{{Identical|Usage restriction}}",
	"mwoauth-consumer-rsakey": "Used as label for the textarea.\n\nFollowed by the textarea or the message {{msg-mw|Mwoauthmanageconsumers-field-hidden}}.",
	"mwoauth-consumer-rsakey-help": "Used as help message for the textarea, on the consumer registration form.",
	"mwoauth-consumer-secretkey": "Used as label for the textarea.",
	"mwoauth-consumer-accesstoken": "Unused at this time.",
	"mwoauth-consumer-reason": "Used as label for the \"Reason\" value.\n{{Identical|Reason}}",
	"mwoauth-consumer-developer-agreement": "Agreement shown on application form, indicating that the app author understands their responsibilities by submitting this form.\n\n\"Application\" means \"app, software application\".",
	"mwoauth-consumer-email-unconfirmed": "Used as failure message when taking some action which requires email-confirmation.",
	"mwoauth-consumer-email-mismatched": "Used as failure message when taking some action.",
	"mwoauth-consumer-alreadyexists": "Used as failure message.",
	"mwoauth-consumer-alreadyexistsversion": "Used as failure message. Parameters:\n* $1 - current consumer version number",
	"mwoauth-consumer-not-accepted": "Unused at this time.",
	"mwoauth-consumer-not-proposed": "Used as failure message when approving or rejecting the consumer.\n\nSee also:\n* {{msg-mw|Mwoauth-consumer-not-disabled}}",
	"mwoauth-consumer-not-disabled": "Used as failure message when re-enabling the consumer.\n\nSee also:\n* {{msg-mw|Mwoauth-consumer-not-proposed}}",
```

---

</SwmSnippet>

<SwmSnippet path="/i18n/en.json" line="33">

---

The <SwmPath>[i18n/en.json](i18n/en.json)</SwmPath> file contains translations for English. For example, the string <SwmToken path="i18n/en.json" pos="33:2:8" line-data="	&quot;mwoauth-consumer-owner-only&quot;: &quot;This consumer is for use only by $1.&quot;,">`mwoauth-consumer-owner-only`</SwmToken> is translated to <SwmToken path="i18n/en.json" pos="33:13:29" line-data="	&quot;mwoauth-consumer-owner-only&quot;: &quot;This consumer is for use only by $1.&quot;,">`This consumer is for use only by $1.`</SwmToken>

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

<SwmSnippet path="/i18n/pt.json" line="45">

---

The <SwmPath>[i18n/pt.json](i18n/pt.json)</SwmPath> file contains translations for Portuguese. For example, the string <SwmToken path="i18n/pt.json" pos="45:2:6" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`mwoauth-consumer-callbackisprefix`</SwmToken> is translated to <SwmToken path="i18n/pt.json" pos="45:11:11" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`Permitir`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:13:13" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`que`</SwmToken>` o `<SwmToken path="i18n/pt.json" pos="45:17:17" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`consumidor`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:19:19" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`especifique`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:21:21" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`um`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:23:23" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`retorno`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:25:25" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`nos`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:27:27" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`pedidos`</SwmToken>` e `<SwmToken path="i18n/pt.json" pos="45:31:31" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`use`</SwmToken>` o `<SwmToken path="i18n/pt.json" pos="45:35:35" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`URL`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:37:37" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`de`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:23:23" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`retorno`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:45:45" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`acima`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:47:47" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`como`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:49:49" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`prefixo`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:51:51" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`obrigatório`</SwmToken>`.`

```json
	"mwoauth-consumer-callbackisprefix": "Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \"retorno\" acima como prefixo obrigatório.",
	"mwoauth-consumer-granttypes": "Tipos de concessões que são solicitadas:",
	"mwoauth-consumer-grantsneeded": "Concessões de permissões aplicáveis:",
	"mwoauth-consumer-required-grant": "Aplicável ao consumidor",
	"mwoauth-consumer-wiki": "Projeto aplicável:",
	"mwoauth-consumer-wiki-thiswiki": "Projeto atual ($1)",
	"mwoauth-consumer-restrictions": "Restrições de uso:",
	"mwoauth-consumer-restrictions-json": "Restrições de uso (JSON)",
	"mwoauth-consumer-rsakey": "Chave pública RSA (opcional):",
	"mwoauth-consumer-rsakey-help": "Introduzir uma chave pública para usar o método de assinatura RSA-SHA1. Deixar vazio para usar HMAC-SHA1 com um segredo aleatório. Se não tem a certeza de qual deve usar, deixar vazio.",
	"mwoauth-consumer-secretkey": "Chave secreta do consumidor:",
	"mwoauth-consumer-accesstoken": "Chave de acesso:",
	"mwoauth-consumer-reason": "Motivo:",
	"mwoauth-consumer-developer-agreement": "Ao enviar esta aplicação, compreende e aceita que reservamos o direito de desativar a sua aplicação, remover ou restringir o seu acesso ou o acesso da sua aplicação a este sítio, e empreender qualquer esforço adicional que consideremos necessário, se acreditarmos, por nossa exclusiva discrição, que está a incorrer ou a sua aplicação está a incorrer na violação de qualquer norma, orientação ou princípio deste sítio. Esta Norma Para Aplicações pode ser alterada em qualquer altura sem aviso prévio, por nossa exclusiva discrição, e conforme considerarmos necessário. A sua utilização continuada do OAuth constitui uma aceitação dessas alterações.",
	"mwoauth-consumer-email-unconfirmed": "O seu endereço de correio eletrónico ainda não foi confirmado.",
	"mwoauth-consumer-email-mismatched": "O endereço de correio eletrónico fornecido deve coincidir com o da sua conta.",
	"mwoauth-consumer-alreadyexists": "Já existe um consumidor com esta combinação de nome, versão e autor",
	"mwoauth-consumer-alreadyexistsversion": "Já existe um consumidor com esta combinação de nome e autor, com uma versão igual ou superior (\"$1)",
	"mwoauth-consumer-not-accepted": "Não foi possível atualizar a informação de um pedido de consumidor pendente",
	"mwoauth-consumer-not-proposed": "Neste momento o consumidor não está proposto",
	"mwoauth-consumer-not-disabled": "Neste momento o consumidor não está desativado",
```

---

</SwmSnippet>

<SwmSnippet path="/i18n/en-gb.json" line="13">

---

The <SwmPath>[i18n/en-gb.json](i18n/en-gb.json)</SwmPath> file contains translations for British English. For example, the string <SwmToken path="i18n/en-gb.json" pos="13:2:10" line-data="	&quot;mwoauth-consumer-owner-only-help&quot;: &quot;Selecting this option will cause the consumer to be automatically approved and accepted for use by $1. It will not be usable by any other user, and the usual authorisation flow will not function. Actions taken using this consumer will not be tagged.&quot;,">`mwoauth-consumer-owner-only-help`</SwmToken> is translated to <SwmToken path="i18n/en-gb.json" pos="13:15:104" line-data="	&quot;mwoauth-consumer-owner-only-help&quot;: &quot;Selecting this option will cause the consumer to be automatically approved and accepted for use by $1. It will not be usable by any other user, and the usual authorisation flow will not function. Actions taken using this consumer will not be tagged.&quot;,">`Selecting this option will cause the consumer to be automatically approved and accepted for use by $1. It will not be usable by any other user, and the usual authorisation flow will not function. Actions taken using this consumer will not be tagged.`</SwmToken>

```json
	"mwoauth-consumer-owner-only-help": "Selecting this option will cause the consumer to be automatically approved and accepted for use by $1. It will not be usable by any other user, and the usual authorisation flow will not function. Actions taken using this consumer will not be tagged.",
	"mwoauthconsumerregistration-propose-text-oauth1": "Developers should use the form below to propose a new OAuth 1.0a consumer (see the [https://www.mediawiki.org/wiki/Special:MyLanguage/Extension:OAuth extension documentation] for more details). After submitting this form, you will receive a token that your application will use to identify itself to MediaWiki. Depending on what capabilities you request, an OAuth administrator might need to approve your application before it can be authorised by other users.\n\nA few recommendations and remarks:\n* Try to use as few grants as possible. Avoid grants that are not actually needed now.\n* Versions are of the form \"major.minor.release\" (the last two being optional) and increase as grant changes are needed.\n* Please provide a public RSA key (in PEM format) if possible; otherwise a (less secure) secret token will have to be used.\n* You can use a project ID to restrict the consumer to a single project on this site (use \"*\" for all projects).",
	"mwoauthconsumerregistration-propose-text-oauth2": "Developers should use the form below to request a token for a new OAuth 2.0 client (see the [https://www.mediawiki.org/wiki/Special:MyLanguage/Extension:OAuth extension documentation] for more details). After submitting this form, you will receive a token that your application will use to identify itself to MediaWiki. Depending on what capabilities you request, an OAuth administrator might need to approve your application before it can be authorised by other users.\n\nA few recommendations and remarks:\n* Try to use as few scopes as possible. Avoid scopes that are not actually needed now.\n* Versions are of the form \"major.minor.release\" (the last two being optional) and increase as scope changes are needed.\n* You can use a project ID to restrict the consumer to a single project on this site (use \"*\" for all projects).",
	"mwoauthmanagemygrants-text": "This page lists any applications that can use your account. For any such application, the scope of its access is limited by the permissions that you granted to the application when you authorised it to act on your behalf. If you separately authorised an application to access different \"sister\" projects on your behalf, then you will see separate configuration for each such project below.\n\nConnected applications access your account by using the OAuth protocol. <span class=\"plainlinks\">([https://www.mediawiki.org/wiki/Special:MyLanguage/Help:OAuth Learn more about connected applications])</span>",
```

---

</SwmSnippet>

<SwmSnippet path="/i18n/pt-br.json" line="45">

---

The <SwmPath>[i18n/pt-br.json](i18n/pt-br.json)</SwmPath> file contains translations for Brazilian Portuguese. For example, the string <SwmToken path="i18n/pt-br.json" pos="45:2:6" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`mwoauth-consumer-callbackisprefix`</SwmToken> is translated to <SwmToken path="i18n/pt-br.json" pos="45:11:11" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`Permitir`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:13:13" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`que`</SwmToken>` o `<SwmToken path="i18n/pt-br.json" pos="45:17:17" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`consumidor`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:19:19" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`especifique`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:21:21" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`um`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:23:23" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`retorno`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:25:25" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`nos`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:27:27" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`pedidos`</SwmToken>` e `<SwmToken path="i18n/pt-br.json" pos="45:31:31" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`use`</SwmToken>` o `<SwmToken path="i18n/pt-br.json" pos="45:35:35" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`URL`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:39:39" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`callback`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:43:43" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`acima`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:45:45" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`como`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:21:21" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`um`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:49:49" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`prefixo`</SwmToken>` `<SwmToken path="i18n/pt-br.json" pos="45:51:51" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL \&quot;callback\&quot; acima como um prefixo necessário.&quot;,">`necessário`</SwmToken>`.`

```json
	"mwoauth-consumer-callbackisprefix": "Permitir que o consumidor especifique um retorno nos pedidos e use o URL \"callback\" acima como um prefixo necessário.",
	"mwoauth-consumer-granttypes": "Tipos de permissões sendo solicitadas:",
	"mwoauth-consumer-grantsneeded": "Permissões aplicáveis:",
	"mwoauth-consumer-required-grant": "Aplicável ao consumidor",
	"mwoauth-consumer-wiki": "Projeto aplicável:",
	"mwoauth-consumer-wiki-thiswiki": "Projeto atual ($1)",
	"mwoauth-consumer-restrictions": "Restrições de uso:",
	"mwoauth-consumer-restrictions-json": "Restrições de uso (JSON):",
	"mwoauth-consumer-rsakey": "Chave RSA pública (opcional):",
	"mwoauth-consumer-rsakey-help": "Digite uma chave pública para usar o método de assinatura RSA-SHA1. Deixe vazio para usar HMAC-SHA1 com um segredo aleatório. Se você não tem certeza, deixe-o vazio.",
	"mwoauth-consumer-secretkey": "Chave secreta do consumidor:",
	"mwoauth-consumer-accesstoken": "Chave de acesso:",
	"mwoauth-consumer-reason": "Motivo:",
	"mwoauth-consumer-developer-agreement": "Ao enviar este aplicativo, você reconhece que nos reservamos o direito de desativar seu aplicativo, removê-lo ou restringir o acesso de você ou o seu aplicativo a este site e seguir qualquer outro curso de ação que consideremos apropriado se acreditarmos, a nosso juízo, que você ou sua aplicação está violando qualquer política, diretriz e princípio orientador deste site. Podemos alterar esta Política de Aplicação a qualquer momento sem aviso prévio, a nosso exclusivo critério e, como julgamos necessário. O seu uso contínuo de OAuth constitui aceitação dessas mudanças.",
	"mwoauth-consumer-email-unconfirmed": "O seu endereço de e-mail ainda não foi confirmado.",
	"mwoauth-consumer-email-mismatched": "O endereço de e-mail fornecido deve coincidir com o da sua conta.",
	"mwoauth-consumer-alreadyexists": "Um consumidor com essa combinação de nome/versão/editor já existe",
	"mwoauth-consumer-alreadyexistsversion": "Um consumidor com essa combinação de nome/editor já existe com uma versão igual ou superior (\"$1\")",
	"mwoauth-consumer-not-accepted": "Não é possível atualizar informações para um pedido de consumidor pendente",
	"mwoauth-consumer-not-proposed": "O consumidor não está proposto atualmente",
	"mwoauth-consumer-not-disabled": "O consumidor não está desativado",
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](/)</sup></SwmMeta>
