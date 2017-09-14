<?php
/**
 * Send Email
 * @name Send Email
 * @description Send an email.
 * @author Inbound Now
 * @contributors Hudson Atwell
 * @package     Automation
 * @subpackage  Actions
*/

if ( !class_exists( 'Inbound_Automation_Action_Send_Email' ) ) {

	class Inbound_Automation_Action_Send_Email {

		function __construct() {

			add_filter( 'inbound_automation_actions' , array( __CLASS__ , 'define_action' ) , 1 , 1);
		}

		/* Build Action Definitions */
		public static function define_action( $actions ) {

			/* Get Lead Lists */
			$lead_lists = Inbound_Leads::get_lead_lists_as_array();

			/* Get Available Email Templates */
			if ( class_exists('Inbound_Mailer_Post_Type') ) {
				$emails = Inbound_Mailer_Post_Type::get_automation_emails_as( 'ARRAY' );
				if (!$emails) {
					$emails[] = __( 'No Automation emails detected. Please create an automated email first.' , 'inbound-pro' );
				}
			} else {
				$emails = array('email component not installed.');
			}


			/* Build Action */
			$actions['send_email'] = array (
					'class_name' => get_class(),
					'id' => 'send_email',
					'label' => 'Send Email',
					'description' => __('Send an email using available filter data.', 'inbound-pro'),
					'settings' => array (
							array (
									'id' => 'send_to',
									'label' => __( 'Send Email To' , 'inbound-pro' ),
									'description' => __('Choose where to send the email', 'inbound-pro'),
									'type' => 'dropdown',
									'options' => array(
											'lead' => __( 'Lead' , 'inbound-pro' ),
											'custom' => __( 'Custom Email Address' , 'inbound-pro' ),
											'lead_list' => __( 'Lead List' , 'inbound-pro' ),
									)
							),
							array (
									'id' => 'custom_email',
									'label' => __( 'Enter Email Address' , 'inbound-pro' ),
									'description' => __('Input email address here.', 'inbound-pro'),
									'type' => 'text',
									'hidden' => true,
									'reveal' => array(
											'selector' => 'send_to',
											'value' => 'custom'
									)
							),
							array (
									'id' => 'lead_lists',
									'label' => __( 'Select Lead List' , 'inbound-pro' ),
									'description' => __('Select the lead list to send an email to. This action could take awhile for large lists. ', 'inbound-pro'),
									'type' => 'select2',
									'hidden' => true,
									'reveal' => array(
											'selector' => 'send_to',
											'value' => 'lead_list'
									),
									'options' => $lead_lists
							),
							array (
									'id' => 'email_id',
									'label' => __( 'Select Email' , 'inbound-pro' ),
									'description' => __('Select the Email to send to. ', 'inbound-pro'),
									'type' => 'dropdown',
									'options' => $emails
							)
					)
			);

			return $actions;
		}


		/**
		 * Runs the send email processing action
		 * @param ARRAY $action saved action settings
		 * @param ARRAY $trigger_data action filters
		 * @param ARRAY $rule_id rule id
		 */
		public static function run_action( $action , $trigger_data ) {


			$Inbound_Templating_Engine = Inbound_Templating_Engine();

			$trigger_data = apply_filters( 'action/send_email/trigger_data' , $trigger_data );

			/* if contains a post_object and the lock is enabled then exit */
			if (isset($trigger_data['post_object']['ID']) && $trigger_data['post_object']['ID']) {
				if (get_post_meta($trigger_data['post_object']['ID'] , 'inbound_automation_email_sent' , true )) {
					inbound_record_log(
						__( 'Email Blocked - Post Locked' , 'inbound-pro') ,
						'<h2>'.__('Details', 'inbound-pro') .'</h2><pre>'.__( 'It seems this email has been manually locked or has already been sent via an automation rule once.' , 'inbound-pro' ).'</pre>' .
						'<h2>'.__('Action Settings' , 'inbound-pro') .'</h2><pre>'. print_r($action,true).'</pre><h2>'.__('Action Settings' , 'inbound-pro') .'</h2><pre>'.print_r($trigger_data,true) .'</pre>',
						$action['rule_id'] ,
						$action['job_id'] ,
						'action_event'
					);
					return;
				}
			}

			switch ($action['send_to']) {

				case 'lead':
					/* Load sender class */
					$Inbound_Mail_Daemon = new Inbound_Mail_Daemon();

					/* get variant marker */
					$vid = Inbound_Mailer_Variations::get_next_variant_marker( $action['email_id'] );

					/* check for lead lists */
					$lead_lists = (isset($trigget_data['lead_data']['lead_lists'])) ? $trigget_data['lead_data']['lead_lists'] : array();

					/* make sure we have an email - this needs refactoring */
					$trigger_data['lead_data']['email'] = (isset($trigger_data['lead_data']['email'])) ? $trigger_data['lead_data']['email'] : '' ;
					$trigger_data['lead_data']['email'] = (isset($trigger_data['lead_data']['wpleads_email_address'])) ? $trigger_data['lead_data']['wpleads_email_address'] : $trigger_data['lead_data']['email'] ;

					/* support for user_register hook */
					if ( isset($trigger_data['user_id']) ) {
						$user = new WP_User( $trigger_data['user_id'] );
						$trigger_data['lead_data']['email'] = $user->data->user_email;

						/* look for lead */
						$trigger_data['lead_data']['id'] = LeadStorage::lookup_lead_by_email($trigger_data['lead_data']['email']);

						/* create lead if does not exist */
						if (!$trigger_data['lead_data']['id']) {
							$args = array(
									'user_ID' => $trigger_data['user_id'],
									'wpleads_email_address' => $trigger_data['lead_data']['email'],
									'wpleads_first_name' => $user->data->display_name
							);

							$trigger_data['lead_data']['id'] = inbound_store_lead( $args );
						}

					}

					/* check for special muting performed by admin */
					$toggle = get_post_meta( $trigger_data['lead_data']['id'] , 'inbound_automation_mute' , true);

					/* if mute is enabled then cancel send */
					if ($toggle) {
						return;
					}
					/* send email */
					$response = $Inbound_Mail_Daemon->send_solo_email( array(
							'email_address' => $trigger_data['lead_data']['email'],
							'lead_id' => $trigger_data['lead_data']['id'],
							'email_id' => $action['email_id'],
							'tags' => array( 'automated' ),
							'vid' => $vid,
							'lead_lists' => $lead_lists,
						    'rule_id' => $action['rule_id'],
						    'job_id' => $action['job_id'],
					));

					BREAK;
				case 'custom':
					/* Load sender class */
					$Inbound_Mail_Daemon = new Inbound_Mail_Daemon();

					/* get variant marker */
					$vid = Inbound_Mailer_Variations::get_next_variant_marker( $action['email_id'] );

					/* send email */
					$response = $Inbound_Mail_Daemon->send_solo_email( array(
							'email_address' => $action['custom_email'],
							'email_id' => $action['email_id'],
							'vid' => $vid,
							'tags' => array('automated'),
							'rule_id' => $action['rule_id'],
						    'job_id' => $action['job_id'],
					));

					BREAK;
				case 'lead_list':
					$Inbound_Mailer_Scheduling = new Inbound_Mailer_Scheduling;
					$response = $Inbound_Mailer_Scheduling->schedule_email( $action['email_id'] , $trigger_data , $action , $action['lead_lists'] );
					$response = __( sprintf( '%s emails have been scheduled' , $response ) , 'inbound-pro' );
					BREAK;


			}

			/* update post object lock if  post object detected */
			if (isset($trigger_data['post_object']['ID']) && $trigger_data['post_object']['ID']) {
				update_post_meta($trigger_data['post_object']['ID'] , 'inbound_automation_email_sent' , true );
			}

			inbound_record_log(
				__( 'Send Email' , 'inbound-pro') ,
				'<h2>'.__('Email Server Response', 'inbound-pro') .'</h2><pre>'.print_r($response,true).'</pre>' .
				'<h2>'.__('Action Settings' , 'inbound-pro') .'</h2><pre>'. print_r($action,true).'</pre><h2>'.__('Action Settings' , 'inbound-pro') .'</h2><pre>'.print_r($trigger_data,true) .'</pre>',
				$action['rule_id'] ,
				$action['job_id'] ,
				'action_event'
			);
		}

	}

	/* Load Action */
	new Inbound_Automation_Action_Send_Email();

}
