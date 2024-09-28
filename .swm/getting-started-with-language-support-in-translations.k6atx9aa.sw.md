---
title: Getting started with Language Support in Translations
---
# Introduction

Language support refers to the ability of the system to provide translations for various languages. This is essential for making the application accessible to a global audience.

# Storing Translations

The translations are stored in JSON files located in the `i18n` directory. Each file corresponds to a specific language or dialect, identified by its language code. These JSON files contain key-value pairs where the key is the original text in English, and the value is the translated text in the target language.

# Loading Translations

When a user selects a language, the system loads the corresponding JSON file and uses it to display the translated text throughout the application. This approach allows for easy addition of new languages by simply creating a new JSON file with the appropriate translations.

# Language Support in JSON Files

The <SwmPath>[i18n/qqq.json](i18n/qqq.json)</SwmPath> file contains key-value pairs where the key is the original text in English, and the value is the translated text in the target language. This file is used to provide translations for various labels and messages in the application.

<SwmSnippet path="/i18n/qqq.json" line="52">

---

Example entries in the <SwmPath>[i18n/qqq.json](i18n/qqq.json)</SwmPath> file showing how translations are stored.

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

# Example of Spanish Translation

The <SwmPath>[i18n/es.json](i18n/es.json)</SwmPath> file contains translations for Spanish. For example, the key <SwmToken path="i18n/es.json" pos="241:2:6" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`mwoauth-tag-reserved`</SwmToken> is translated to <SwmToken path="i18n/es.json" pos="241:11:44" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`Las etiquetas que comienzan con <code>OAuth CID:</code> están reservadas para que las use OAuth.`</SwmToken>

<SwmSnippet path="/i18n/es.json" line="241">

---

Example entry in the <SwmPath>[i18n/es.json](i18n/es.json)</SwmPath> file showing a Spanish translation.

```json
	"mwoauth-tag-reserved": "Las etiquetas que comienzan con <code>OAuth CID:</code> están reservadas para que las use OAuth.",
```

---

</SwmSnippet>

# Example of English Translation

The <SwmPath>[i18n/en.json](i18n/en.json)</SwmPath> file contains translations for English. For example, the key <SwmToken path="i18n/en.json" pos="33:2:8" line-data="	&quot;mwoauth-consumer-owner-only&quot;: &quot;This consumer is for use only by $1.&quot;,">`mwoauth-consumer-owner-only`</SwmToken> is translated to <SwmToken path="i18n/en.json" pos="33:13:29" line-data="	&quot;mwoauth-consumer-owner-only&quot;: &quot;This consumer is for use only by $1.&quot;,">`This consumer is for use only by $1.`</SwmToken>

<SwmSnippet path="/i18n/en.json" line="33">

---

Example entries in the <SwmPath>[i18n/en.json](i18n/en.json)</SwmPath> file showing English translations.

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

# Example of Portuguese Translation

The <SwmPath>[i18n/pt.json](i18n/pt.json)</SwmPath> file contains translations for Portuguese. For example, the key <SwmToken path="i18n/qqq.json" pos="52:2:6" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Used as a label for the check box where user can decide if their consumer should use \&quot;Callback URL\&quot; as a string prefix (checked), or if the consumer cannot customize the callback URL in its requests as is required to specify \&quot;oob\&quot; (unchecked, default).&quot;,">`mwoauth-consumer-callbackisprefix`</SwmToken> is translated to <SwmToken path="i18n/pt.json" pos="45:11:11" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`Permitir`</SwmToken>` `<SwmToken path="i18n/es.json" pos="241:15:15" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`que`</SwmToken>` o `<SwmToken path="i18n/pt.json" pos="45:17:17" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`consumidor`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:19:19" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`especifique`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:21:21" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`um`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:23:23" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`retorno`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:25:25" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`nos`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:27:27" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`pedidos`</SwmToken>` e `<SwmToken path="i18n/qqq.json" pos="52:43:43" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Used as a label for the check box where user can decide if their consumer should use \&quot;Callback URL\&quot; as a string prefix (checked), or if the consumer cannot customize the callback URL in its requests as is required to specify \&quot;oob\&quot; (unchecked, default).&quot;,">`use`</SwmToken>` o `<SwmToken path="i18n/qqq.json" pos="52:49:49" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Used as a label for the check box where user can decide if their consumer should use \&quot;Callback URL\&quot; as a string prefix (checked), or if the consumer cannot customize the callback URL in its requests as is required to specify \&quot;oob\&quot; (unchecked, default).&quot;,">`URL`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:37:37" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`de`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:23:23" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`retorno`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:45:45" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`acima`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:47:47" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`como`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:49:49" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`prefixo`</SwmToken>` `<SwmToken path="i18n/pt.json" pos="45:51:51" line-data="	&quot;mwoauth-consumer-callbackisprefix&quot;: &quot;Permitir que o consumidor especifique um retorno nos pedidos e use o URL de \&quot;retorno\&quot; acima como prefixo obrigatório.&quot;,">`obrigatório`</SwmToken>`.`

<SwmSnippet path="/i18n/pt.json" line="45">

---

Example entries in the <SwmPath>[i18n/pt.json](i18n/pt.json)</SwmPath> file showing Portuguese translations.

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

<SwmSnippet path="/i18n/pt-br.json" line="45">

---

Example entries in the <SwmPath>[i18n/pt-br.json](i18n/pt-br.json)</SwmPath> file showing Brazilian Portuguese translations.

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

# Example of British English Translation

The <SwmPath>[i18n/en-gb.json](i18n/en-gb.json)</SwmPath> file contains translations for British English. For example, the key <SwmToken path="i18n/en.json" pos="34:2:10" line-data="	&quot;mwoauth-consumer-owner-only-help&quot;: &quot;Selecting this option will cause the consumer to be automatically approved and accepted for use by $1. It will not be usable by any other user, and the usual authorization flow will not function. Actions taken using this consumer will not be tagged.&quot;,">`mwoauth-consumer-owner-only-help`</SwmToken> is translated to <SwmToken path="i18n/en-gb.json" pos="13:15:104" line-data="	&quot;mwoauth-consumer-owner-only-help&quot;: &quot;Selecting this option will cause the consumer to be automatically approved and accepted for use by $1. It will not be usable by any other user, and the usual authorisation flow will not function. Actions taken using this consumer will not be tagged.&quot;,">`Selecting this option will cause the consumer to be automatically approved and accepted for use by $1. It will not be usable by any other user, and the usual authorisation flow will not function. Actions taken using this consumer will not be tagged.`</SwmToken>

<SwmSnippet path="/i18n/en-gb.json" line="13">

---

Example entries in the <SwmPath>[i18n/en-gb.json](i18n/en-gb.json)</SwmPath> file showing British English translations.

```json
	"mwoauth-consumer-owner-only-help": "Selecting this option will cause the consumer to be automatically approved and accepted for use by $1. It will not be usable by any other user, and the usual authorisation flow will not function. Actions taken using this consumer will not be tagged.",
	"mwoauthconsumerregistration-propose-text-oauth1": "Developers should use the form below to propose a new OAuth 1.0a consumer (see the [https://www.mediawiki.org/wiki/Special:MyLanguage/Extension:OAuth extension documentation] for more details). After submitting this form, you will receive a token that your application will use to identify itself to MediaWiki. Depending on what capabilities you request, an OAuth administrator might need to approve your application before it can be authorised by other users.\n\nA few recommendations and remarks:\n* Try to use as few grants as possible. Avoid grants that are not actually needed now.\n* Versions are of the form \"major.minor.release\" (the last two being optional) and increase as grant changes are needed.\n* Please provide a public RSA key (in PEM format) if possible; otherwise a (less secure) secret token will have to be used.\n* You can use a project ID to restrict the consumer to a single project on this site (use \"*\" for all projects).",
	"mwoauthconsumerregistration-propose-text-oauth2": "Developers should use the form below to request a token for a new OAuth 2.0 client (see the [https://www.mediawiki.org/wiki/Special:MyLanguage/Extension:OAuth extension documentation] for more details). After submitting this form, you will receive a token that your application will use to identify itself to MediaWiki. Depending on what capabilities you request, an OAuth administrator might need to approve your application before it can be authorised by other users.\n\nA few recommendations and remarks:\n* Try to use as few scopes as possible. Avoid scopes that are not actually needed now.\n* Versions are of the form \"major.minor.release\" (the last two being optional) and increase as scope changes are needed.\n* You can use a project ID to restrict the consumer to a single project on this site (use \"*\" for all projects).",
	"mwoauthmanagemygrants-text": "This page lists any applications that can use your account. For any such application, the scope of its access is limited by the permissions that you granted to the application when you authorised it to act on your behalf. If you separately authorised an application to access different \"sister\" projects on your behalf, then you will see separate configuration for each such project below.\n\nConnected applications access your account by using the OAuth protocol. <span class=\"plainlinks\">([https://www.mediawiki.org/wiki/Special:MyLanguage/Help:OAuth Learn more about connected applications])</span>",
```

---

</SwmSnippet>

# Language Support Endpoints

Language support endpoints are used to manage <SwmToken path="i18n/es.json" pos="241:24:24" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`OAuth`</SwmToken> consumer applications and their translations.

## <SwmToken path="i18n/nb.json" pos="81:20:24" line-data="	&quot;mwoauthconsumerregistration-propose-text&quot;: &quot;Du kan:\n* [[Special:OAuthConsumerRegistration/propose/oauth1a|Foreslå en OAuth 1.0a-konsument]].\n* [[Special:OAuthConsumerRegistration/propose/oauth2|Foreslå en OAuth 2.0-klient]].&quot;,">`Special:OAuthConsumerRegistration/propose`</SwmToken>

The endpoint <SwmToken path="i18n/nb.json" pos="81:20:24" line-data="	&quot;mwoauthconsumerregistration-propose-text&quot;: &quot;Du kan:\n* [[Special:OAuthConsumerRegistration/propose/oauth1a|Foreslå en OAuth 1.0a-konsument]].\n* [[Special:OAuthConsumerRegistration/propose/oauth2|Foreslå en OAuth 2.0-klient]].&quot;,">`Special:OAuthConsumerRegistration/propose`</SwmToken> allows developers to propose a new <SwmToken path="i18n/es.json" pos="241:24:24" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`OAuth`</SwmToken> consumer application. This is used to register a new <SwmToken path="i18n/es.json" pos="241:24:24" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`OAuth`</SwmToken> consumer by providing necessary details such as the application name, version, and callback URL.

<SwmSnippet path="/i18n/nb.json" line="81">

---

Example entry in the <SwmPath>[i18n/nb.json](i18n/nb.json)</SwmPath> file showing the propose endpoint.

```json
	"mwoauthconsumerregistration-propose-text": "Du kan:\n* [[Special:OAuthConsumerRegistration/propose/oauth1a|Foreslå en OAuth 1.0a-konsument]].\n* [[Special:OAuthConsumerRegistration/propose/oauth2|Foreslå en OAuth 2.0-klient]].",
```

---

</SwmSnippet>

## <SwmToken path="i18n/en.json" pos="84:129:133" line-data="	&quot;mwoauthconsumerregistration-maintext&quot;: &quot;This page is for letting developers propose and update OAuth consumer applications in this site&#39;s registry.\n\nFrom here, you can:\n* [[Special:OAuthConsumerRegistration/propose/oauth1a|Request a token for a new OAuth 1.0a consumer]].\n* [[Special:OAuthConsumerRegistration/propose/oauth2|Request a token for a new OAuth 2.0 client]].\n* [[Special:OAuthConsumerRegistration/list|Manage your existing consumers]].\n\nFor more information about OAuth, please see the [https://www.mediawiki.org/wiki/Special:MyLanguage/Extension:OAuth extension documentation].&quot;,">`Special:OAuthConsumerRegistration/list`</SwmToken>

The endpoint <SwmToken path="i18n/en.json" pos="84:129:133" line-data="	&quot;mwoauthconsumerregistration-maintext&quot;: &quot;This page is for letting developers propose and update OAuth consumer applications in this site&#39;s registry.\n\nFrom here, you can:\n* [[Special:OAuthConsumerRegistration/propose/oauth1a|Request a token for a new OAuth 1.0a consumer]].\n* [[Special:OAuthConsumerRegistration/propose/oauth2|Request a token for a new OAuth 2.0 client]].\n* [[Special:OAuthConsumerRegistration/list|Manage your existing consumers]].\n\nFor more information about OAuth, please see the [https://www.mediawiki.org/wiki/Special:MyLanguage/Extension:OAuth extension documentation].&quot;,">`Special:OAuthConsumerRegistration/list`</SwmToken> provides a list of <SwmToken path="i18n/es.json" pos="241:24:24" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`OAuth`</SwmToken> consumers that the user controls. This is used to manage existing <SwmToken path="i18n/es.json" pos="241:24:24" line-data="	&quot;mwoauth-tag-reserved&quot;: &quot;Las etiquetas que comienzan con &lt;code&gt;OAuth CID:&lt;/code&gt; están reservadas para que las use OAuth.&quot;,">`OAuth`</SwmToken> consumer applications, allowing users to update or review their details.

<SwmSnippet path="/i18n/nb.json" line="79">

---

Example entry in the <SwmPath>[i18n/nb.json](i18n/nb.json)</SwmPath> file showing the list endpoint.

```json
	"mwoauthconsumerregistration-list": "Min konsumentliste",
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](/)</sup></SwmMeta>
