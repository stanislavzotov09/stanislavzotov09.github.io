<?php
/*
Plugin Name: Inbound Automation
Plugin URI: http://www.inboundnow.com/
Description: Automate emails, segmenting, scoring & more.
Version: 2.0.0

*/

if (!class_exists('Inbound_Automation_Plugin') && class_exists('Inbound_Leads_Plugin')) {

	/**
	 * Class Inbound_Automation_Plugin
	 * @package Automation
	 */
	final class Inbound_Automation_Plugin {

		/**
		* Main Inbound_Automation_Plugin Instance
		*/
		public function __construct() {
			self::define_constants();
			self::includes();
			self::load_text_domain_init();
		}

		/**
		* Setup plugin constants
		*/
		private static function define_constants() {
			define( 'INBOUND_AUTOMATION_CURRENT_VERSION', '2.0.0' );
			define( 'INBOUND_AUTOMATION_FILE',  __FILE__ );
			define( 'INBOUND_AUTOMATION_URLPATH',  plugins_url( '/' , __FILE__ )  );
			define( 'INBOUND_AUTOMATION_PATH', WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/' );
			define(	'INBOUND_AUTOMATION_SLUG', plugin_basename( dirname(__FILE__) ) );
		}

		/**
		*  Include required plugin files
		*/
		private static function includes() {

			switch (is_admin()) :
				case true :
					/* loads admin files */
					include_once('classes/class.activation.upgrade-routines.php');
					include_once('classes/class.activation.php');
					include_once('classes/class.adminbar.php');
					include_once('classes/class.post-type.automation.php');
					include_once('classes/class.logs.php');
					include_once('classes/class.definitions.loader.php');
					include_once('classes/class.metaboxes.automation.php');
					include_once('classes/class.automation.php');
					include_once('classes/class.lead-profile.php');

					include_once('definitions/trigger.inbound_store_lead_post.php');
					include_once('definitions/trigger.inbound_double_optin_confirm.php');
					//include_once('definitions/trigger.page_tracking_event.php');
					include_once('definitions/trigger.user_register.php');
					include_once('definitions/trigger.set_object_terms.php');
					include_once('definitions/trigger.draft_to_publish.php');
					include_once('definitions/trigger.inbound_track_link.php');
					include_once('definitions/action.wait.php');
					include_once('definitions/action.create_lead.php');
					include_once('definitions/action.send_email.php');
					include_once('definitions/action.relay_data.php');
					include_once('definitions/action.add_remove_list.php');
					include_once('definitions/action.add_remove_tag.php');
					include_once('definitions/action.kill_lead_tasks.php');
					include_once('definitions/query.lead_data.php');
					include_once('definitions/query.user_data.php');

					BREAK;

				case false :
					/* load front-end files */
					include_once('classes/class.post-type.automation.php');
					include_once('classes/class.automation.php');
					include_once('classes/class.logs.php');
					include_once('classes/class.definitions.loader.php');
					include_once('classes/class.metaboxes.automation.php');
					include_once('classes/class.automation.php');

					include_once('definitions/trigger.inbound_store_lead_post.php');
					include_once('definitions/trigger.draft_to_publish.php');
					include_once('definitions/trigger.inbound_double_optin_confirm.php');
					include_once('definitions/trigger.user_register.php');
					include_once('definitions/trigger.inbound_track_link.php');
					include_once('definitions/action.wait.php');
					include_once('definitions/action.create_lead.php');
					include_once('definitions/action.send_email.php');
					include_once('definitions/action.relay_data.php');
					include_once('definitions/action.add_remove_list.php');
					include_once('definitions/action.add_remove_tag.php');
					include_once('definitions/action.kill_lead_tasks.php');
					include_once('definitions/query.lead_data.php');
					include_once('definitions/query.user_data.php');

					BREAK;
			endswitch;
		}

		/**
		*  Loads the correct .mo file for this plugin
		*/
		private static function load_text_domain_init() {
			add_action( 'init' , array( __CLASS__ , 'load_text_domain' ) );
		}

		public static function load_text_domain() {
			load_plugin_textdomain( 'automation' , false , INBOUND_AUTOMATION_SLUG . '/lang/' );
		}

		/* START PHP VERSION CHECKS */
		/**
		 * Admin notices, collected and displayed on proper action
		 *
		 * @var array
		 */
		public static $notices = array();

		/**
		 * Whether the current PHP version meets the minimum requirements
		 *
		 * @return bool
		 */
		public static function is_valid_php_version() {
			return version_compare( PHP_VERSION, '5.3', '>=' );
		}

		/**
		 * Invoked when the PHP version check fails. Load up the translations and
		 * add the error message to the admin notices
		 */
		static function fail_php_version() {
			//add_action( 'plugins_loaded', array( __CLASS__, 'load_text_domain_init' ) );
			$plugin_url = admin_url( 'plugins.php' );
			self::notice( __( 'Inbound Automation requires PHP version 5.3+ to run. Your version '.PHP_VERSION.' is not high enough.<br><u>Please contact your hosting provider</u> to upgrade your PHP Version.<br>The plugin is NOT Running. You can disable this warning message by <a href="'.$plugin_url.'">deactivating the plugin</a>', 'cta' ) );
		}

		/**
		 * Handle notice messages according to the appropriate context (WP-CLI or the WP Admin)
		 *
		 * @param string $message
		 * @param bool $is_error
		 * @return void
		 */
		public static function notice( $message, $is_error = true ) {
			if ( defined( 'WP_CLI' ) ) {
				$message = strip_tags( $message );
				if ( $is_error ) {
					WP_CLI::warning( $message );
				} else {
					WP_CLI::success( $message );
				}
			} else {
				// Trigger admin notices
				add_action( 'all_admin_notices', array( __CLASS__, 'admin_notices' ) );

				self::$notices[] = compact( 'message', 'is_error' );
			}
		}

		/**
		 * Show an error or other message in the WP Admin
		 *
		 * @action all_admin_notices
		 * @return void
		 */
		public static function admin_notices() {
			foreach ( self::$notices as $notice ) {
				$class_name   = empty( $notice['is_error'] ) ? 'updated' : 'error';
				$html_message = sprintf( '<div class="%s">%s</div>', esc_attr( $class_name ), wpautop( $notice['message'] ) );
				echo wp_kses_post( $html_message );
			}
		}

		/* END PHP VERSION CHECKS */


	}

	/* Initiate Plugin */
	if ( Inbound_Automation_Plugin::is_valid_php_version() ) {
		new Inbound_Automation_Plugin;
	} else {
		// Show Fail
		Inbound_Automation_Plugin::fail_php_version();
	}

	/**
	 * Checks if Inbound Automation is active
	 * @package Automation
	 */
	function inbound_automation_check_active() {
		return 1;
	}

}