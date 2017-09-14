<?php

/**
 * Class for adding automation debug links to top admin Inbound Pro menu tree
 * @package     Automation
 * @subpackage  Menus
 */

class Inbound_Automation_Adminbar {

    public static function init() {
        self::hooks();
    }


    /**
     *  Loads Hooks & Filters
     */
    public static function hooks() {
        add_filter( 'inbound_menu_debug' , array (__CLASS__ , 'load_debug_links') , 10 , 2);


    }

    /**
     *  Loads debug menu item section
     */
    public static function load_debug_links( $secondary_menu_items , $debug_key ) {

        /* Show queue */
        $secondary_menu_items['automation-view-rule-queue'] = array(
            'parent' => $debug_key,
            'title'  => __( 'View Automation Rule Queue', 'inbound-pro' ),
            'href'   => admin_url('?automation-view-rule-queue=true'),
            'meta'   => array( 'title' =>  __( 'Click here to view automation rules.', 'inbound-pro' ) )
        );

        /* Empty queue */
        $secondary_menu_items['automation-empty-queue=true'] = array(
            'parent' => $debug_key,
            'title'  => __( 'Clear Automation Rule Queue', 'inbound-pro' ),
            'href'   => admin_url('?automation-empty-queue=true'),
            'meta'   => array( 'title' =>  __( 'Click here to empty automation queue.', 'inbound-pro' ) )
        );


        /*  Run Rules */
        $secondary_menu_items['automation-run-rules=true'] = array(
            'parent' => $debug_key,
            'title'  => __( 'Run Automation Rules', 'inbound-pro' ),
            'href'   => admin_url('?automation-run-rules=true'),
            'meta'   => array( 'title' =>  __( 'Click here to manually run the automation queue.', 'inbound-pro' ) )
        );


        return $secondary_menu_items;
    }

}

add_action('init' , array( 'Inbound_Automation_Adminbar' , 'init' ) );
