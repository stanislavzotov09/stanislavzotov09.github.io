<?php

/**
 * WordPress user creation event
 * @name WordPress user creation event
 * @description: Fires when a user is added to the WordPress users table
 * @uthor: Inbound Now
 * @contributors: Hudson Atwell
 * @package Automation
 * @subpackage Triggers
 *
*/

if ( !class_exists( 'Inbound_Automation_Trigger_User_Register' ) ) {

	class Inbound_Automation_Trigger_User_Register {

		static $trigger;

		/**
		 * Inbound_Automation_Trigger_User_Register constructor.
		 */
		function __construct() {
			self::$trigger = 'user_register';
			add_filter( 'inbound_automation_triggers' , array( __CLASS__ , 'define_trigger' ) , 1 , 1);
			//add_action( 'activate/automation' , array( __CLASS__ , 'create_dummy_event' ) );
		}

		/**
		 * Build Trigger Definitions
		 */
		public static function define_trigger( $triggers ) {

			/* Set & Extend Trigger Argument Filters */
			$arguments = apply_filters('trigger/user_register/trigger_arguments/' , array(
				'user_id' => array(
					'id' => 'user_id',
					'label' => __( 'User ID' , 'inbound-pro')
				)
			) );

			/* Set & Extend Action DB Lookup Filters */
			$db_lookup_filters = apply_filters( 'trigger/uer_register/db_arguments' , array (
				array(
					'id' => 'user_data',
					'label' => __( 'Validate User Data', 'inbound-pro' ),
					'class_name' => 'Inbound_Automation_Query_User'
				)
			));

			/* Set & Extend Available Actions */
			$actions = apply_filters('trigger/user_register/actions' , array(
				'create_lead' ,'add_remove_lead_list','add_remove_lead_tag','send_email' , 'wait' , 'relay_data'
			) );

			$triggers[ self::$trigger ] = array (
				'label' => __('On new WP user creation' , 'inbound-pro'),
				'description' => __('This trigger fires whenever new user is created inside the WordPress system.' , 'inbound-pro'),
				'action_hook' => self::$trigger ,
				'arguments' => $arguments,
				'db_lookup_filters' => $db_lookup_filters,
				'actions' => $actions
			);

			return $triggers;
		}

		/**
		 * Simulate trigger - perform on plugin activation
		 */
		public static function create_dummy_event() {


			$event = array (
				'user_id' => 1
			);

			$inbound_arguments = Inbound_Options_API::get_option( 'inbound_automation' , 'arguments' );
			$inbound_arguments = ( $inbound_arguments  ) ?  $inbound_arguments : array();
			$inbound_arguments[self::$trigger]['user_id'] = $lead;

			Inbound_Options_API::update_option( 'inbound_automation' , 'arguments' ,  $inbound_arguments );
		}
	}

	/* Load Trigger */
	new Inbound_Automation_Trigger_User_Register;

}