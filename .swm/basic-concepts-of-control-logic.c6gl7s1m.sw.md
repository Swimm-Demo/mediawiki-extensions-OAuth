---
title: Basic Concepts of Control Logic
---
```mermaid
graph TD;
 A[Client Request] --> B[SubmitControl Class];
 B --> C[Check Permissions];
 B --> D[Validate Actions and Parameters];
 B --> E[Route to Internal Function];
 E --> F[DAOAccessControl Class];
 F --> G[Check User Permissions];
 F --> H[Retrieve Field Value];
 F --> I[Return Appropriate Message];
 graph TD;
 A[submit] --> B[checkBasePermissions];
 B --> C[validateFields];
 C --> D[processAction];
 E[validateFieldInternal] --> F[getRequiredFields];
 F --> G[validate field values];
```

# Overview

Control Logic refers to the mechanisms that handle the validation, submission, and processing of client requests. This document will cover the basic concepts of control logic in the `src` directory, focusing on the <SwmToken path="src/Control/SubmitControl.php" pos="38:4:4" line-data="abstract class SubmitControl extends ContextSource {">`SubmitControl`</SwmToken> and <SwmToken path="src/Control/DAOAccessControl.php" pos="32:2:2" line-data="class DAOAccessControl extends ContextSource {">`DAOAccessControl`</SwmToken> classes.

# <SwmToken path="src/Control/SubmitControl.php" pos="38:4:4" line-data="abstract class SubmitControl extends ContextSource {">`SubmitControl`</SwmToken> Class

The <SwmToken path="src/Control/SubmitControl.php" pos="38:4:4" line-data="abstract class SubmitControl extends ContextSource {">`SubmitControl`</SwmToken> class is responsible for managing the submission process. This includes checking permissions, validating actions and parameters, and routing the submission to the appropriate internal function.

<SwmSnippet path="/src/Control/SubmitControl.php" line="5">

---

The <SwmToken path="src/Control/SubmitControl.php" pos="38:4:4" line-data="abstract class SubmitControl extends ContextSource {">`SubmitControl`</SwmToken> class uses several dependencies such as <SwmToken path="src/Control/SubmitControl.php" pos="5:2:2" line-data="use ApiMessage;">`ApiMessage`</SwmToken>, <SwmToken path="src/Control/SubmitControl.php" pos="6:2:2" line-data="use LogicException;">`LogicException`</SwmToken>, <SwmToken path="src/Control/SubmitControl.php" pos="7:6:6" line-data="use MediaWiki\Context\ContextSource;">`ContextSource`</SwmToken>, and <SwmToken path="src/Control/SubmitControl.php" pos="8:6:6" line-data="use MediaWiki\Context\IContextSource;">`IContextSource`</SwmToken>.

```hack
use ApiMessage;
use LogicException;
use MediaWiki\Context\ContextSource;
use MediaWiki\Context\IContextSource;
```

---

</SwmSnippet>

# submit Function

The <SwmToken path="src/Control/SubmitControl.php" pos="67:5:5" line-data="	public function submit() {">`submit`</SwmToken> function is a key part of the control logic. It performs several steps: checking base permissions, validating required fields for the specified action, and processing the action.

<SwmSnippet path="/src/Control/SubmitControl.php" line="67">

---

The <SwmToken path="src/Control/SubmitControl.php" pos="67:5:5" line-data="	public function submit() {">`submit`</SwmToken> function checks basic permissions, validates the action and parameters, and routes the submission handling to the internal subclass function.

```hack
	public function submit() {
		$status = $this->checkBasePermissions();
		if ( !$status->isOK() ) {
			return $status;
		}

		$action = $this->vals['action'];
		$required = $this->getRequiredFields();
		if ( !isset( $required[$action] ) ) {
			// @TODO: check for field-specific message first
			return $this->failure( 'invalid_field_action', 'mwoauth-invalid-field', 'action' );
		}

		$status = $this->validateFields( $required[$action] );
		if ( !$status->isOK() ) {
			return $status;
		}

		$status = $this->processAction( $action );
		if ( $status instanceof Status ) {
			return $status;
```

---

</SwmSnippet>

# <SwmToken path="src/Control/SubmitControl.php" pos="132:5:5" line-data="	public function validateFieldInternal( string $field, $value, array $allValues, HTMLForm $form ) {">`validateFieldInternal`</SwmToken> Function

The <SwmToken path="src/Control/SubmitControl.php" pos="132:5:5" line-data="	public function validateFieldInternal( string $field, $value, array $allValues, HTMLForm $form ) {">`validateFieldInternal`</SwmToken> function performs basic checks and calls the validator provided by <SwmToken path="src/Control/SubmitControl.php" pos="74:9:9" line-data="		$required = $this-&gt;getRequiredFields();">`getRequiredFields`</SwmToken>. It ensures that the field values meet the required criteria before submission.

<SwmSnippet path="/src/Control/SubmitControl.php" line="132">

---

The <SwmToken path="src/Control/SubmitControl.php" pos="132:5:5" line-data="	public function validateFieldInternal( string $field, $value, array $allValues, HTMLForm $form ) {">`validateFieldInternal`</SwmToken> function checks if the field values meet the required criteria before submission.

```hack
	public function validateFieldInternal( string $field, $value, array $allValues, HTMLForm $form ) {
		if ( !isset( $allValues['action'] ) && isset( $this->vals['action'] ) ) {
			// The action may be derived, especially for multi-button forms.
			// Such an HTMLForm will not have an action key set in $allValues.
			$allValues['action'] = $this->vals['action'];
		}
		if ( !isset( $allValues['action'] ) ) {
			throw new MWException( "No form action defined; cannot validate fields." );
		}
		$validators = $this->getRequiredFields();
		if ( !isset( $validators[$allValues['action']][$field] ) ) {
			// nothing to check
			return true;
		}
		$validator = $validators[$allValues['action']][$field];
		$validationResult = $this->getValidationResult( $validator, $value, $allValues, $form );
		if ( $validationResult === false ) {
			return $this->getDefaultValidationError( $field, $value, $form )->text();
		} elseif ( $validationResult instanceof ApiMessage ) {
			return $validationResult->parse();
		}
```

---

</SwmSnippet>

# <SwmToken path="src/Control/DAOAccessControl.php" pos="32:2:2" line-data="class DAOAccessControl extends ContextSource {">`DAOAccessControl`</SwmToken> Class

The <SwmToken path="src/Control/DAOAccessControl.php" pos="32:2:2" line-data="class DAOAccessControl extends ContextSource {">`DAOAccessControl`</SwmToken> class wraps around an <SwmToken path="src/Control/DAOAccessControl.php" pos="26:10:10" line-data="use MediaWiki\Extension\OAuth\Backend\MWOAuthDAO;">`MWOAuthDAO`</SwmToken> object and handles authorization to view fields. It ensures that only authorized users can access certain data fields.

<SwmSnippet path="/src/Control/DAOAccessControl.php" line="5">

---

The <SwmToken path="src/Control/DAOAccessControl.php" pos="32:2:2" line-data="class DAOAccessControl extends ContextSource {">`DAOAccessControl`</SwmToken> class ensures that only authorized users can access certain data fields.

```hack
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
```

---

</SwmSnippet>

# get Function

The <SwmToken path="src/Control/SubmitControl.php" pos="230:3:3" line-data="	 * Get the field names and their validation methods. Fields can be omitted. Fields that are">`Get`</SwmToken> function retrieves the value of a field, taking into account user permissions. If access is denied, it returns an appropriate message.

<SwmSnippet path="/src/Control/DAOAccessControl.php" line="5">

---

The <SwmToken path="src/Control/SubmitControl.php" pos="230:3:3" line-data="	 * Get the field names and their validation methods. Fields can be omitted. Fields that are">`Get`</SwmToken> function retrieves the value of a field, considering user permissions.

```hack
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
```

---

</SwmSnippet>

# <SwmToken path="src/Control/DAOAccessControl.php" pos="107:11:11" line-data="		$msg = $this-&gt;dao-&gt;userCanAccess( $name, $this-&gt;getContext() );">`userCanAccess`</SwmToken> Function

The <SwmToken path="src/Control/DAOAccessControl.php" pos="107:11:11" line-data="		$msg = $this-&gt;dao-&gt;userCanAccess( $name, $this-&gt;getContext() );">`userCanAccess`</SwmToken> function checks whether the user has permission to access the specified <SwmToken path="src/Control/DAOAccessControl.php" pos="118:19:21" line-data="	 * Check whether the user can access the given field(s).">`field(s`</SwmToken>).

<SwmSnippet path="/src/Control/DAOAccessControl.php" line="5">

---

The <SwmToken path="src/Control/DAOAccessControl.php" pos="107:11:11" line-data="		$msg = $this-&gt;dao-&gt;userCanAccess( $name, $this-&gt;getContext() );">`userCanAccess`</SwmToken> function checks if the user has permission to access the specified <SwmToken path="src/Control/DAOAccessControl.php" pos="118:19:21" line-data="	 * Check whether the user can access the given field(s).">`field(s`</SwmToken>).

```hack
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
```

---

</SwmSnippet>

&nbsp;

*This is an auto-generated document by Swimm AI 🌊 and has not yet been verified by a human*

<SwmMeta version="3.0.0" repo-id="Z2l0aHViJTNBJTNBbWVkaWF3aWtpLWV4dGVuc2lvbnMtT0F1dGglM0ElM0FTd2ltbS1EZW1v" repo-name="mediawiki-extensions-OAuth"><sup>Powered by [Swimm](/)</sup></SwmMeta>
