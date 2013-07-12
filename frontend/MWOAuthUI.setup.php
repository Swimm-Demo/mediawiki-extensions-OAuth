<?php
/**
 * Class containing hooked functions for an OAuth environment
 */
class MWOAuthUISetup {
	/**
	 * @param array $pages $wgSpecialPages (list of special pages)
	 * @param array $groups $wgSpecialPageGroups (assoc array of special page groups)
	 * @return void
	 */
	public static function defineSpecialPages( array &$pages, array &$groups ) {
		// Pages specific to the central OAuth management wiki
		if ( MWOAuthUtils::isCentralWiki() ) {
			$pages['MWOAuthConsumerRegistration'] = 'MWOAuthConsumerRegistration';
			$groups['MWOAuthConsumerRegistration'] = 'users';
			$pages['MWOAuthManageConsumers'] = 'MWOAuthManageConsumers';
			$groups['MWOAuthManageConsumers'] = 'users';
			$pages['MWOAuthManageMyGrants'] = 'MWOAuthManageMyGrants';
		}
		// I think we want to allow the handshake with any wiki
		$pages['OAuth'] = 'SpecialOAuth';
	}

	/**
	 * @param array $hooks $wgHooks
	 * @return void
	 */
	public static function defineHookHandlers( &$hooks ) {
		$hooks['GetPreferences'][] = 'MWOAuthUIHooks::onGetPreferences';
	}

	/**
	 * @param array $logNames $wgLogNames (assoc array of log name message keys)
	 * @param array $logHeaders $wgLogHeaders (assoc array of log header message keys)
	 * @param array $filterLogTypes $wgFilterLogTypes
	 * @return void
	 */
	public static function defineLogBasicDescription(
		&$logNames, &$logHeaders, &$filterLogTypes
	) {
		$logNames['mwoauthconsumer'] = 'mwoauthconsumer-consumer-logpage';
		$logHeaders['mwoauthconsumer'] = 'mwoauthconsumer-consumer-logpagetext';
	}

	/**
	 * @param array$logActions $wgLogActions (assoc array of log action message keys)
	 * @param array $logActionsHandlers $wgLogActionsHandlers (assoc array of log handlers)
	 * @return void
	 */
	public static function defineLogActionHandlers(
		&$logActions, &$logActionsHandlers
	) {
		$logActionsHandlers['mwoauthconsumer/*'] = 'LogFormatter';
	}

	/**
	 * Append resource module definitions
	 * @param $modules Array $wgResourceModules
	 * @return void
	 */
	public static function defineResourceModules( array &$modules ) {
		$modules['ext.MWOAuth'] = array(
			'styles'        => 'MWOAuth.css',
			'localBasePath' => dirname( __FILE__ ) . '/modules',
			'remoteExtPath' => 'OAuth/frontend/modules',
		);
	}
}
