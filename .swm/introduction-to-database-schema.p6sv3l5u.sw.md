---
title: Introduction to Database Schema
---
```mermaid
erDiagram
    oauth_registered_consumer {
        integer oarc_id
        binary oarc_consumer_key
        binary oarc_name
        ...
    }
    oauth2_access_tokens {
        integer oaat_id
        string oaat_identifier
        mwtimestamp oaat_expires
        ...
    }
    oauth_registered_consumer ||--o| oauth2_access_tokens : contains

%% Swimm:
%% erDiagram
%%     <SwmToken path="schema/tables.json" pos="3:7:7" line-data="		&quot;name&quot;: &quot;oauth_registered_consumer&quot;,">`oauth_registered_consumer`</SwmToken> {
%%         integer <SwmToken path="schema/tables.json" pos="7:7:7" line-data="				&quot;name&quot;: &quot;oarc_id&quot;,">`oarc_id`</SwmToken>
%%         binary <SwmToken path="schema/tables.json" pos="8:22:22" line-data="				&quot;comment&quot;: &quot;Internal numeric consumer ID (1:1 with oarc_consumer_key)&quot;,">`oarc_consumer_key`</SwmToken>
%%         binary <SwmToken path="schema/tables.json" pos="19:7:7" line-data="				&quot;name&quot;: &quot;oarc_name&quot;,">`oarc_name`</SwmToken>
%%         ...
%%     }
%%     <SwmToken path="schema/tables.json" pos="258:7:7" line-data="		&quot;name&quot;: &quot;oauth2_access_tokens&quot;,">`oauth2_access_tokens`</SwmToken> {
%%         integer <SwmToken path="schema/tables.json" pos="262:7:7" line-data="				&quot;name&quot;: &quot;oaat_id&quot;,">`oaat_id`</SwmToken>
%%         string <SwmToken path="schema/tables.json" pos="268:7:7" line-data="				&quot;name&quot;: &quot;oaat_identifier&quot;,">`oaat_identifier`</SwmToken>
%%         mwtimestamp <SwmToken path="schema/tables.json" pos="274:7:7" line-data="				&quot;name&quot;: &quot;oaat_expires&quot;,">`oaat_expires`</SwmToken>
%%         ...
%%     }
%%     <SwmToken path="schema/tables.json" pos="3:7:7" line-data="		&quot;name&quot;: &quot;oauth_registered_consumer&quot;,">`oauth_registered_consumer`</SwmToken> ||--o| <SwmToken path="schema/tables.json" pos="258:7:7" line-data="		&quot;name&quot;: &quot;oauth2_access_tokens&quot;,">`oauth2_access_tokens`</SwmToken> : contains
```

# Introduction

The database schema in the <SwmToken path="schema/tables.json" pos="14:14:14" line-data="				&quot;comment&quot;: &quot;External consumer ID (OAuth 1 consumer key, OAuth 2 client ID)&quot;,">`OAuth`</SwmToken> extension defines the structure of the database tables used to store OAuth-related data. It includes the tables, columns, data types, and constraints necessary for maintaining data integrity and optimizing data retrieval.

# Schema Structure

The schema consists of multiple tables, each designed to store specific types of data related to <SwmToken path="schema/tables.json" pos="14:14:14" line-data="				&quot;comment&quot;: &quot;External consumer ID (OAuth 1 consumer key, OAuth 2 client ID)&quot;,">`OAuth`</SwmToken>. Key tables include <SwmToken path="schema/tables.json" pos="3:7:7" line-data="		&quot;name&quot;: &quot;oauth_registered_consumer&quot;,">`oauth_registered_consumer`</SwmToken> and <SwmToken path="schema/tables.json" pos="258:7:7" line-data="		&quot;name&quot;: &quot;oauth2_access_tokens&quot;,">`oauth2_access_tokens`</SwmToken>.

# Tables in Schema

The <SwmToken path="schema/tables.json" pos="3:7:7" line-data="		&quot;name&quot;: &quot;oauth_registered_consumer&quot;,">`oauth_registered_consumer`</SwmToken> table stores information about client consumers, while the <SwmToken path="schema/tables.json" pos="258:7:7" line-data="		&quot;name&quot;: &quot;oauth2_access_tokens&quot;,">`oauth2_access_tokens`</SwmToken> table stores access tokens used in <SwmToken path="schema/tables.json" pos="259:15:15" line-data="		&quot;comment&quot;: &quot;Access tokens used on OAuth2 requests&quot;,">`OAuth2`</SwmToken> requests.

# Columns and Data Types

Each table has a set of columns with specific data types and constraints. For example, the <SwmToken path="schema/tables.json" pos="3:7:7" line-data="		&quot;name&quot;: &quot;oauth_registered_consumer&quot;,">`oauth_registered_consumer`</SwmToken> table includes columns like <SwmToken path="schema/tables.json" pos="7:7:7" line-data="				&quot;name&quot;: &quot;oarc_id&quot;,">`oarc_id`</SwmToken>, <SwmToken path="schema/tables.json" pos="8:22:22" line-data="				&quot;comment&quot;: &quot;Internal numeric consumer ID (1:1 with oarc_consumer_key)&quot;,">`oarc_consumer_key`</SwmToken>, and <SwmToken path="schema/tables.json" pos="19:7:7" line-data="				&quot;name&quot;: &quot;oarc_name&quot;,">`oarc_name`</SwmToken>.

<SwmSnippet path="/schema/tables.json" line="1">

---

The <SwmToken path="schema/tables.json" pos="3:7:7" line-data="		&quot;name&quot;: &quot;oauth_registered_consumer&quot;,">`oauth_registered_consumer`</SwmToken> table includes columns such as <SwmToken path="schema/tables.json" pos="7:7:7" line-data="				&quot;name&quot;: &quot;oarc_id&quot;,">`oarc_id`</SwmToken>, <SwmToken path="schema/tables.json" pos="8:22:22" line-data="				&quot;comment&quot;: &quot;Internal numeric consumer ID (1:1 with oarc_consumer_key)&quot;,">`oarc_consumer_key`</SwmToken>, and <SwmToken path="schema/tables.json" pos="19:7:7" line-data="				&quot;name&quot;: &quot;oarc_name&quot;,">`oarc_name`</SwmToken>, each with defined data types and constraints.

```json
[
	{
		"name": "oauth_registered_consumer",
		"comment": "Client consumers (proposed as well as and accepted)",
		"columns": [
			{
				"name": "oarc_id",
				"comment": "Internal numeric consumer ID (1:1 with oarc_consumer_key)",
				"type": "integer",
				"options": { "autoincrement": true, "notnull": true, "unsigned": true }
			},
			{
				"name": "oarc_consumer_key",
				"comment": "External consumer ID (OAuth 1 consumer key, OAuth 2 client ID)",
				"type": "binary",
				"options": { "notnull": true, "length": 32 }
			},
			{
				"name": "oarc_name",
				"comment": "Human-readable name of the application",
				"type": "binary",
```

---

</SwmSnippet>

# Indexes

Indexes are defined in the schema to optimize query performance. For instance, an index is created on the <SwmToken path="schema/tables.json" pos="283:7:7" line-data="				&quot;name&quot;: &quot;oaat_acceptance_id&quot;,">`oaat_acceptance_id`</SwmToken> column in the <SwmToken path="schema/tables.json" pos="258:7:7" line-data="		&quot;name&quot;: &quot;oauth2_access_tokens&quot;,">`oauth2_access_tokens`</SwmToken> table.

<SwmSnippet path="/schema/tables.json" line="258">

---

The <SwmToken path="schema/tables.json" pos="258:7:7" line-data="		&quot;name&quot;: &quot;oauth2_access_tokens&quot;,">`oauth2_access_tokens`</SwmToken> table includes columns for the token ID, acceptance ID, and other relevant details.

```json
		"name": "oauth2_access_tokens",
		"comment": "Access tokens used on OAuth2 requests",
		"columns": [
			{
				"name": "oaat_id",
				"comment": "Internal numeric identifier",
				"type": "integer",
				"options": { "autoincrement": true, "notnull": true, "unsigned": true }
			},
			{
				"name": "oaat_identifier",
				"comment": "External access token identifier (JSON Web Token ID)",
				"type": "string",
				"options": { "notnull": true, "length": 255 }
			},
			{
				"name": "oaat_expires",
				"comment": "Expiration timestamp",
				"type": "mwtimestamp",
				"options": {
					"notnull": true,
```

---

</SwmSnippet>

# Importance of Schema

The schema is essential for ensuring data integrity and efficient data retrieval in the <SwmToken path="schema/tables.json" pos="14:14:14" line-data="				&quot;comment&quot;: &quot;External consumer ID (OAuth 1 consumer key, OAuth 2 client ID)&quot;,">`OAuth`</SwmToken> extension.

# Main Functions

The main functions of the schema include managing client consumers and handling <SwmToken path="schema/tables.json" pos="259:15:15" line-data="		&quot;comment&quot;: &quot;Access tokens used on OAuth2 requests&quot;,">`OAuth2`</SwmToken> token management.

## <SwmToken path="schema/tables.json" pos="3:7:7" line-data="		&quot;name&quot;: &quot;oauth_registered_consumer&quot;,">`oauth_registered_consumer`</SwmToken>

The <SwmToken path="schema/tables.json" pos="3:7:7" line-data="		&quot;name&quot;: &quot;oauth_registered_consumer&quot;,">`oauth_registered_consumer`</SwmToken> table stores information about client consumers, including their internal numeric ID, external consumer key, <SwmToken path="schema/tables.json" pos="20:7:9" line-data="				&quot;comment&quot;: &quot;Human-readable name of the application&quot;,">`Human-readable`</SwmToken> name, and various other attributes.

## <SwmToken path="schema/tables.json" pos="258:7:7" line-data="		&quot;name&quot;: &quot;oauth2_access_tokens&quot;,">`oauth2_access_tokens`</SwmToken>

The <SwmToken path="schema/tables.json" pos="258:7:7" line-data="		&quot;name&quot;: &quot;oauth2_access_tokens&quot;,">`oauth2_access_tokens`</SwmToken> table stores access tokens used in <SwmToken path="schema/tables.json" pos="259:15:15" line-data="		&quot;comment&quot;: &quot;Access tokens used on OAuth2 requests&quot;,">`OAuth2`</SwmToken> requests. It includes columns for the token ID, acceptance ID, and other relevant details.

<SwmSnippet path="/schema/tables.json" line="258">

---

The <SwmToken path="schema/tables.json" pos="258:7:7" line-data="		&quot;name&quot;: &quot;oauth2_access_tokens&quot;,">`oauth2_access_tokens`</SwmToken> table includes columns for the token ID, acceptance ID, and other relevant details.

```json
		"name": "oauth2_access_tokens",
		"comment": "Access tokens used on OAuth2 requests",
		"columns": [
			{
				"name": "oaat_id",
				"comment": "Internal numeric identifier",
				"type": "integer",
				"options": { "autoincrement": true, "notnull": true, "unsigned": true }
			},
			{
				"name": "oaat_identifier",
				"comment": "External access token identifier (JSON Web Token ID)",
				"type": "string",
				"options": { "notnull": true, "length": 255 }
			},
			{
				"name": "oaat_expires",
				"comment": "Expiration timestamp",
				"type": "mwtimestamp",
				"options": {
					"notnull": true,
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](/)</sup></SwmMeta>
