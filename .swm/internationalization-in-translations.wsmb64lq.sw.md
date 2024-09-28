---
title: Internationalization in Translations
---
```mermaid
graph TD;
    A[Internationalization Process] --> B[JSON Files for Different Languages];
    B --> C[English Translations];
    B --> D[Spanish Translations];
    B --> E[Portuguese Translations];
    B --> F[British English Translations];
    B --> G[Brazilian Portuguese Translations];
    B --> H[Translation Context and Descriptions];
```

# Understanding Internationalization in Translations

Internationalization refers to the process of designing and developing software so that it can be adapted to various languages and regions without requiring engineering changes. In the Translations directory, internationalization is implemented through JSON files that contain key-value pairs for different languages. Each JSON file corresponds to a specific language and includes translations for various strings used in the application.

# JSON Files for Different Languages

The file <SwmPath>[i18n/en.json](i18n/en.json)</SwmPath> contains translations for English. Each key-value pair represents a string used in the application and its corresponding translation.

<SwmSnippet path="/i18n/en.json" line="33">

---

Example translations in English.

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

<SwmSnippet path="/i18n/es.json" line="241">

---

Example translation in Spanish.

```json
	"mwoauth-tag-reserved": "Las etiquetas que comienzan con <code>OAuth CID:</code> están reservadas para que las use OAuth.",
```

---

</SwmSnippet>

<SwmSnippet path="/i18n/pt.json" line="45">

---

Example translations in Portuguese.

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

Example translations in British English.

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

Example translations in Brazilian Portuguese.

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

The file <SwmPath>[i18n/qqq.json](i18n/qqq.json)</SwmPath> provides context and descriptions for the translation keys. This helps translators understand the purpose and usage of each string, ensuring accurate translations.

<SwmSnippet path="/i18n/qqq.json" line="52">

---

Context and descriptions for translation keys.

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

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](/)</sup></SwmMeta>
