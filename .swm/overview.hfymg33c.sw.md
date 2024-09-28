---
title: Overview
---
The mediawiki-extensions-OAuth repository provides OAuth functionality for MediaWiki, allowing users to authenticate and authorize third-party applications to interact with MediaWiki on their behalf.

## Main Components

### Languages

Languages refer to the different linguistic translations available for the software. These translations are stored in JSON files, each named according to the language code, and are used to provide localized content to users based on their language preferences.

- <SwmLink doc-title="Languages overview">[Languages overview](.swm/languages-overview.hke1or79.sw.md)</SwmLink>
- <SwmLink doc-title="Understanding language translations">[Understanding language translations](.swm/understanding-language-translations.l105txwa.sw.md)</SwmLink>
- <SwmLink doc-title="Localization in software">[Localization in software](.swm/localization-in-software.4w368byg.sw.md)</SwmLink>

### Translations

Translations refer to the process of converting text from one language to another to support multiple languages in the application.

- <SwmLink doc-title="Translations overview">[Translations overview](.swm/translations-overview.rsygsswv.sw.md)</SwmLink>
- <SwmLink doc-title="Internationalization in translations">[Internationalization in translations](.swm/internationalization-in-translations.wsmb64lq.sw.md)</SwmLink>
- <SwmLink doc-title="Exploring localization in translations">[Exploring localization in translations](.swm/exploring-localization-in-translations.e851vsf3.sw.md)</SwmLink>
- <SwmLink doc-title="Getting started with language support in translations">[Getting started with language support in translations](.swm/getting-started-with-language-support-in-translations.k6atx9aa.sw.md)</SwmLink>

### maintenance

Maintenance scripts are used to perform administrative tasks and manage the system efficiently.

- <SwmLink doc-title="Maintenance scripts overview">[Maintenance scripts overview](.swm/maintenance-scripts-overview.3wwx7en5.sw.md)</SwmLink>
- <SwmLink doc-title="Overview of central wiki migration">[Overview of central wiki migration](.swm/overview-of-central-wiki-migration.cze3iqa4.sw.md)</SwmLink>
- <SwmLink doc-title="Central wiki logs migration">[Central wiki logs migration](.swm/central-wiki-logs-migration.tts7xywj.sw.md)</SwmLink>
- <SwmLink doc-title="Basic concepts of oauth consumer testing">[Basic concepts of oauth consumer testing](.swm/basic-concepts-of-oauth-consumer-testing.t4rls0ya.sw.md)</SwmLink>
- <SwmLink doc-title="Overview of create oauth consumer">[Overview of create oauth consumer](.swm/overview-of-create-oauth-consumer.4m66ohia.sw.md)</SwmLink>

### resources

Resources are components that include client-side assets and server-side elements to manage functionalities like user interface, styling, and secure access to user information.

- <SwmLink doc-title="Resources overview">[Resources overview](.swm/resources-overview.eoq41giv.sw.md)</SwmLink>
- <SwmLink doc-title="Basic concepts of javascript modules in resources">[Basic concepts of javascript modules in resources](.swm/basic-concepts-of-javascript-modules-in-resources.8ktntvt5.sw.md)</SwmLink>
- <SwmLink doc-title="Getting started with dialogs in resources">[Getting started with dialogs in resources](.swm/getting-started-with-dialogs-in-resources.6ftm1pnr.sw.md)</SwmLink>
- **Styles**
  - <SwmLink doc-title="Understanding styles in resources">[Understanding styles in resources](.swm/understanding-styles-in-resources.oint62o9.sw.md)</SwmLink>
  - <SwmLink doc-title="Authorize form styles overview">[Authorize form styles overview](.swm/authorize-form-styles-overview.umsmko4s.sw.md)</SwmLink>
  - <SwmLink doc-title="Understanding basic styles">[Understanding basic styles](.swm/understanding-basic-styles.755rj7b4.sw.md)</SwmLink>

### schema

The schema defines the structure of the database, including tables, columns, data types, and constraints, ensuring proper data organization and integrity.

- <SwmLink doc-title="Schema overview">[Schema overview](.swm/schema-overview.ofrm1yb2.sw.md)</SwmLink>
- **Schema**
  - <SwmLink doc-title="Basic concepts of database schema">[Basic concepts of database schema](.swm/basic-concepts-of-database-schema.l96gffhr.sw.md)</SwmLink>
  - <SwmLink doc-title="Understanding sql schema">[Understanding sql schema](.swm/understanding-sql-schema.5k98d3ww.sw.md)</SwmLink>
  - <SwmLink doc-title="Understanding oauth2 schema">[Understanding oauth2 schema](.swm/understanding-oauth2-schema.sbxasoxo.sw.md)</SwmLink>
  - <SwmLink doc-title="Database patches in schema">[Database patches in schema](.swm/database-patches-in-schema.vsn86qyp.sw.md)</SwmLink>
- **OAuth**
  - <SwmLink doc-title="Understanding oauth schema">[Understanding oauth schema](.swm/understanding-oauth-schema.44pv856j.sw.md)</SwmLink>
  - <SwmLink doc-title="Overview of oauth version">[Overview of oauth version](.swm/overview-of-oauth-version.w1l0134c.sw.md)</SwmLink>
  - <SwmLink doc-title="Introduction to oauth2">[Introduction to oauth2](.swm/introduction-to-oauth2.hfreksix.sw.md)</SwmLink>
  - <SwmLink doc-title="Introduction to database schema">[Introduction to database schema](.swm/introduction-to-database-schema.p6sv3l5u.sw.md)</SwmLink>

### src

The src directory contains the core codebase, organized into various subdirectories such as Control, Lib, Entity, Rest, Repository, Exception, Backend, Frontend, and AuthorizationProvider. Each subdirectory houses specific components and functionalities essential for the OAuth extension, including control logic, library utilities, entity definitions, REST handlers, repository classes, exception handling, backend processes, frontend interfaces, and authorization providers.

- <SwmLink doc-title="Overview of the src directory">[Overview of the src directory](.swm/overview-of-the-src-directory.wv80ew47.sw.md)</SwmLink>
- <SwmLink doc-title="Rest api functionality overview">[Rest api functionality overview](.swm/rest-api-functionality-overview.3lot9dxn.sw.md)</SwmLink>
- <SwmLink doc-title="Session management in src">[Session management in src](.swm/session-management-in-src.xu3mqaeh.sw.md)</SwmLink>
- <SwmLink doc-title="Overview of oauth entities">[Overview of oauth entities](.swm/overview-of-oauth-entities.eubxvxrv.sw.md)</SwmLink>
- <SwmLink doc-title="Pagination management overview">[Pagination management overview](.swm/pagination-management-overview.hpc5kuiy.sw.md)</SwmLink>
- <SwmLink doc-title="Overview of repository classes">[Overview of repository classes](.swm/overview-of-repository-classes.2i1q5aex.sw.md)</SwmLink>
- <SwmLink doc-title="The accesstoken class">[The accesstoken class](.swm/the-accesstoken-class.qcryy.sw.md)</SwmLink>
- **Control Logic**
  - <SwmLink doc-title="Basic concepts of control logic">[Basic concepts of control logic](.swm/basic-concepts-of-control-logic.c6gl7s1m.sw.md)</SwmLink>
  - <SwmLink doc-title="Introduction to consumer management control">[Introduction to consumer management control](.swm/introduction-to-consumer-management-control.ukhfapai.sw.md)</SwmLink>
- **OAuth Library**
  - <SwmLink doc-title="Exploring oauth library">[Exploring oauth library](.swm/exploring-oauth-library.9v768sm8.sw.md)</SwmLink>
  - <SwmLink doc-title="The oauthsignaturemethodrsasha1 class">[The oauthsignaturemethodrsasha1 class](.swm/the-oauthsignaturemethodrsasha1-class.axgkb.sw.md)</SwmLink>
- **Backend Services**
  - <SwmLink doc-title="Overview of backend services">[Overview of backend services](.swm/overview-of-backend-services.5iukhd15.sw.md)</SwmLink>
  - <SwmLink doc-title="Exploring mwoauthdao">[Exploring mwoauthdao](.swm/exploring-mwoauthdao.nhfnretd.sw.md)</SwmLink>
  - <SwmLink doc-title="Oauth utility functions overview">[Oauth utility functions overview](.swm/oauth-utility-functions-overview.8sqwgx60.sw.md)</SwmLink>
  - **Consumer**
    - <SwmLink doc-title="Introduction to oauth consumer">[Introduction to oauth consumer](.swm/introduction-to-oauth-consumer.zzbyhnjv.sw.md)</SwmLink>
    - <SwmLink doc-title="The consumer class">[The consumer class](.swm/the-consumer-class.3k0hn.sw.md)</SwmLink>
- **Special pages**
  - <SwmLink doc-title="Displaying consumer information flow">[Displaying consumer information flow](.swm/displaying-consumer-information-flow.rd9qki9f.sw.md)</SwmLink>
  - <SwmLink doc-title="Managing oauth consumers">[Managing oauth consumers](.swm/managing-oauth-consumers.5i6zcmxc.sw.md)</SwmLink>
  - <SwmLink doc-title="Executing the main flow">[Executing the main flow](.swm/executing-the-main-flow.8awk89z4.sw.md)</SwmLink>
  - **Specialmwo auth**
    - <SwmLink doc-title="Oauth special page overview">[Oauth special page overview](.swm/oauth-special-page-overview.b2w7ezlu.sw.md)</SwmLink>
    - <SwmLink doc-title="Executing oauth actions">[Executing oauth actions](.swm/executing-oauth-actions.35d917uk.sw.md)</SwmLink>
  - **Specialmwo auth consumer registration**
    - <SwmLink doc-title="Oauth consumer registration overview">[Oauth consumer registration overview](.swm/oauth-consumer-registration-overview.sxmzvpfi.sw.md)</SwmLink>
    - <SwmLink doc-title="Executing oauth consumer registration">[Executing oauth consumer registration](.swm/executing-oauth-consumer-registration.jsbdewc1.sw.md)</SwmLink>
- **Manage Consumers**
  - <SwmLink doc-title="Overview of src directory">[Overview of src directory](.swm/overview-of-src-directory.z83eqeqb.sw.md)</SwmLink>
  - <SwmLink doc-title="Basic concepts of managing oauth consumers">[Basic concepts of managing oauth consumers](.swm/basic-concepts-of-managing-oauth-consumers.9oz4fp7i.sw.md)</SwmLink>
  - <SwmLink doc-title="Consumer management in control access">[Consumer management in control access](.swm/consumer-management-in-control-access.vydcoo1o.sw.md)</SwmLink>
  - **Flows**
    - <SwmLink doc-title="Setting an authorized user">[Setting an authorized user](.swm/setting-an-authorized-user.a08fgj8x.sw.md)</SwmLink>
    - <SwmLink doc-title="Authorization process overview">[Authorization process overview](.swm/authorization-process-overview.dlls2jos.sw.md)</SwmLink>
    - <SwmLink doc-title="Access token initialization and validation flow">[Access token initialization and validation flow](.swm/access-token-initialization-and-validation-flow.vj4pnnte.sw.md)</SwmLink>
    - <SwmLink doc-title="Migrating oauth consumer data">[Migrating oauth consumer data](.swm/migrating-oauth-consumer-data.pnfopsn7.sw.md)</SwmLink>
    - <SwmLink doc-title="Handling authorization request flow">[Handling authorization request flow](.swm/handling-authorization-request-flow.me7ysx1y.sw.md)</SwmLink>
    - <SwmLink doc-title="Formatting consumer data flow">[Formatting consumer data flow](.swm/formatting-consumer-data-flow.k6i9hnj9.sw.md)</SwmLink>
    - <SwmLink doc-title="Formatting user grant data">[Formatting user grant data](.swm/formatting-user-grant-data.yvtxxaye.sw.md)</SwmLink>
    - <SwmLink doc-title="Formatting consumer data flow">[Formatting consumer data flow](.swm/formatting-consumer-data-flow.nltv3okh.sw.md)</SwmLink>
    - <SwmLink doc-title="Revoking an access token">[Revoking an access token](.swm/revoking-an-access-token.qiazqb86.sw.md)</SwmLink>
    - <SwmLink doc-title="Validating and filtering scopes flow">[Validating and filtering scopes flow](.swm/validating-and-filtering-scopes-flow.lp2mxpcj.sw.md)</SwmLink>
    - <SwmLink doc-title="Preventing user sessions flow">[Preventing user sessions flow](.swm/preventing-user-sessions-flow.6dmkeo40.sw.md)</SwmLink>
    - <SwmLink doc-title="Merging user accounts flow">[Merging user accounts flow](.swm/merging-user-accounts-flow.zr1rhlg4.sw.md)</SwmLink>
- **Flows**
  - <SwmLink doc-title="Handling oauth consumer actions">[Handling oauth consumer actions](.swm/handling-oauth-consumer-actions.dabx6i5e.sw.md)</SwmLink>
  - <SwmLink doc-title="Handling user actions flow">[Handling user actions flow](.swm/handling-user-actions-flow.ifdz1625.sw.md)</SwmLink>
  - <SwmLink doc-title="Handling oauth requests and providing session information">[Handling oauth requests and providing session information](.swm/handling-oauth-requests-and-providing-session-information.3b5uv2fv.sw.md)</SwmLink>
  - <SwmLink doc-title="Authorization process overview">[Authorization process overview](.swm/authorization-process-overview.0qez721m.sw.md)</SwmLink>
  - <SwmLink doc-title="Handling user authentication and authorization">[Handling user authentication and authorization](.swm/handling-user-authentication-and-authorization.w9ygbqaz.sw.md)</SwmLink>
  - <SwmLink doc-title="Handling request tokens flow">[Handling request tokens flow](.swm/handling-request-tokens-flow.fpz93lnq.sw.md)</SwmLink>
  - <SwmLink doc-title="Fetching access token flow">[Fetching access token flow](.swm/fetching-access-token-flow.7ul2gm27.sw.md)</SwmLink>
  - <SwmLink doc-title="Retrieving and processing oauth claims">[Retrieving and processing oauth claims](.swm/retrieving-and-processing-oauth-claims.xx2wvttu.sw.md)</SwmLink>
  - <SwmLink doc-title="Generating oauth notification header message">[Generating oauth notification header message](.swm/generating-oauth-notification-header-message.g8n089r5.sw.md)</SwmLink>
  - <SwmLink doc-title="Generating oauth notification subject line">[Generating oauth notification subject line](.swm/generating-oauth-notification-subject-line.yyc73odz.sw.md)</SwmLink>
  - <SwmLink doc-title="Checking user email visibility">[Checking user email visibility](.swm/checking-user-email-visibility.0wbuxw80.sw.md)</SwmLink>
  - <SwmLink doc-title="Request execution flow">[Request execution flow](.swm/request-execution-flow.c6ij93w8.sw.md)</SwmLink>

### tests

Tests are essential for ensuring the reliability and correctness of the codebase. They validate that individual units of code, such as functions and classes, work as expected. Tests can also simulate various scenarios to check the system's behavior under different conditions. By running tests, developers can detect and fix bugs early, maintain code quality, and ensure that new changes do not break existing functionality.

- <SwmLink doc-title="Tests overview">[Tests overview](.swm/tests-overview.j4i6tphq.sw.md)</SwmLink>
- **Rest**
  - <SwmLink doc-title="Understanding rest api testing">[Understanding rest api testing](.swm/understanding-rest-api-testing.03ragbge.sw.md)</SwmLink>
  - <SwmLink doc-title="Overview of authorization in rest">[Overview of authorization in rest](.swm/overview-of-authorization-in-rest.hc0qajbl.sw.md)</SwmLink>
  - <SwmLink doc-title="Client management in rest">[Client management in rest](.swm/client-management-in-rest.y53ecerr.sw.md)</SwmLink>
  - <SwmLink doc-title="Token management in rest">[Token management in rest](.swm/token-management-in-rest.2u9z02zg.sw.md)</SwmLink>
- **Control**
  - <SwmLink doc-title="Getting started with consumer control">[Getting started with consumer control](.swm/getting-started-with-consumer-control.vvxkp8yk.sw.md)</SwmLink>
  - <SwmLink doc-title="Introduction to consumer submission control">[Introduction to consumer submission control](.swm/introduction-to-consumer-submission-control.8je872lt.sw.md)</SwmLink>
- **Lib**
  - <SwmLink doc-title="Overview of lib in tests">[Overview of lib in tests](.swm/overview-of-lib-in-tests.kfth4t04.sw.md)</SwmLink>
  - <SwmLink doc-title="Oauth signature in library">[Oauth signature in library](.swm/oauth-signature-in-library.x015olsd.sw.md)</SwmLink>
  - <SwmLink doc-title="Oauth token overview">[Oauth token overview](.swm/oauth-token-overview.9l6xhn19.sw.md)</SwmLink>
  - <SwmLink doc-title="Overview of oauth server">[Overview of oauth server](.swm/overview-of-oauth-server.6shlzy1g.sw.md)</SwmLink>
- **Repository**
  - <SwmLink doc-title="Overview of repository tests">[Overview of repository tests](.swm/overview-of-repository-tests.97lm8uog.sw.md)</SwmLink>
  - <SwmLink doc-title="Basic concepts of claimstore repository">[Basic concepts of claimstore repository](.swm/basic-concepts-of-claimstore-repository.azq6gfc2.sw.md)</SwmLink>
  - <SwmLink doc-title="Getting started with authcoderepository">[Getting started with authcoderepository](.swm/getting-started-with-authcoderepository.n9xsjlap.sw.md)</SwmLink>
  - <SwmLink doc-title="Overview of accesstokenrepository">[Overview of accesstokenrepository](.swm/overview-of-accesstokenrepository.dywigtnt.sw.md)</SwmLink>
  - <SwmLink doc-title="Getting started with scope repository">[Getting started with scope repository](.swm/getting-started-with-scope-repository.ibyukujj.sw.md)</SwmLink>
- **Backend**
  - <SwmLink doc-title="Overview of backend tests">[Overview of backend tests](.swm/overview-of-backend-tests.jhxsurk1.sw.md)</SwmLink>
  - <SwmLink doc-title="Basic concepts of oauth server in backend">[Basic concepts of oauth server in backend](.swm/basic-concepts-of-oauth-server-in-backend.j73e8azi.sw.md)</SwmLink>
  - <SwmLink doc-title="Getting started with oauth exception handling">[Getting started with oauth exception handling](.swm/getting-started-with-oauth-exception-handling.dtlcnu1b.sw.md)</SwmLink>
  - <SwmLink doc-title="Exploring oauth hooks in backend">[Exploring oauth hooks in backend](.swm/exploring-oauth-hooks-in-backend.g19b1hvl.sw.md)</SwmLink>
- **Entity**
  - <SwmLink doc-title="Exploring entity tests">[Exploring entity tests](.swm/exploring-entity-tests.w0q86yj2.sw.md)</SwmLink>
  - <SwmLink doc-title="Exploring client entity">[Exploring client entity](.swm/exploring-client-entity.pvuv3gv3.sw.md)</SwmLink>
  - <SwmLink doc-title="Overview of access token">[Overview of access token](.swm/overview-of-access-token.fbrlhwqd.sw.md)</SwmLink>
  - <SwmLink doc-title="Basic concepts of user entity">[Basic concepts of user entity](.swm/basic-concepts-of-user-entity.4d6k7055.sw.md)</SwmLink>
  - <SwmLink doc-title="Exploring claim in entity">[Exploring claim in entity](.swm/exploring-claim-in-entity.ran0ge95.sw.md)</SwmLink>

### Flows

- <SwmLink doc-title="Fetching and constructing user profile information">[Fetching and constructing user profile information](.swm/fetching-and-constructing-user-profile-information.7jewioja.sw.md)</SwmLink>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](/)</sup></SwmMeta>
