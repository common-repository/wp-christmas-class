<?php	
	/*
	Plugin Name: WP Christmas Class
    Plugin URI: https://www.creare.co.uk/services/extensions/wordpress/wp-christmas-class
    Description: WP Christmas Class allows you to dynamically add a custom CSS class to your body tag during a date range of your choosing. Adding a seasonal body class is perfect for tweaking your design during the festive period.
    Author: Daniel Long
    Version: 0.2
    Author URI: https://www.creare.co.uk/

	Copyright 2013  Daniel Long  (email : dan@creare.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/
	
$wp_christmas_class = new wp_christmas_class();

class wp_christmas_class {
	
	public function __construct() {
		if ( is_admin() ){ 
			add_action('admin_menu', array( $this, 'creare_christmas_admin_actions' ) );   
			add_action('admin_init', array( $this, 'creare_christmas_setting' ) );
			add_action('admin_init', array( $this, 'creare_christmas_css' ) ); 
		}
		add_action( 'wp', array($this, 'creare_execute_christmas' ) );
	}
	
	function creare_christmas_admin_actions() { 
		$page = add_options_page( __( 'Christmas options', 'mytextdomain' ), __( 'WP Christmas Class', 'mytextdomain' ), 'edit_theme_options', 'creare_theme_options', array( $this, 'creare_christmas_do_page' ) );
		add_action( 'admin_print_styles-' . $page, array( $this, 'creare_christmas_enqueue_admin_styles' ) );
	}
	
	function settings_link($links, $file) {
        $plugin_file = basename(__FILE__);
        if (basename($file) == $plugin_file) {
            $settings_link = '<a href="options-general.php?page=creare_theme_options">Settings</a>';
            array_unshift($links, $settings_link);
        }
        return $links;
    }
	  
	function creare_christmas_css() {
		wp_register_style( 'crearechristmasadminstyles', plugins_url('creare-christmas.css', __FILE__ ),'','', 'screen' );
	}
	
	function creare_christmas_enqueue_admin_styles() {
		wp_enqueue_style( 'crearechristmasadminstyles' );
		wp_register_style( 'creare-christmas-jquery-ui-datepicker', plugins_url('/datepicker/smoothness.css', __FILE__ ),'','', 'screen' );
		wp_enqueue_style( 'creare-christmas-jquery-ui-datepicker' );
		add_action('admin_head', array( $this, 'creare_christmas_admin_js_styles' ) );
	}
	
	function creare_christmas_admin_js_styles() { 
		wp_enqueue_script( 'jquery-ui-datepicker' );
	 }
	
	function creare_christmas_class_validation( $value ) {
		
		$value = preg_replace('/[^A-Za-z\s-_]/', '', $value);
		
		$value = preg_replace('/[^A-Za-z-_]/', '-', $value);
		
		if(substr($value,0,1) == "-"){
			return substr($value,1);	
		}
		
		return $value;
		
	}
	
	function creare_christmas_setting(){
		register_setting( 'creare_christmas_options', 'creare_christmas_settings_from');
		register_setting( 'creare_christmas_options', 'creare_christmas_settings_to');
		register_setting( 'creare_christmas_options', 'creare_christmas_settings_custom_class', 'creare_christmas_class_validation' );
		register_setting( 'creare_christmas_options', 'creare_christmas_settings_repeatcheck');
	} 
	
	function creare_christmas_do_page() { 
		require_once( 'wp-christmas-class-settings.php' );
	}
	
	// Get our body class
	function creare_christmas_body_class( $classes ) {
		
		$value = get_option( 'creare_christmas_settings_custom_class' );
		$classes[] = $value;
	
		return $classes;
		
	}
	
	// The main event
	function creare_execute_christmas() {
	
		$from = get_option( 'creare_christmas_settings_from' );
		$to = get_option( 'creare_christmas_settings_to' );
		$now = time();
		
		$repeat = get_option( 'creare_christmas_settings_repeatcheck' );
		
		$to = strtotime( $to );
		$from = strtotime( $from );
	
		if( $now >= $from && $now <= $to ){
			
			add_filter( 'body_class', array( $this, 'creare_christmas_body_class' ) );
	
		} else {
			
			if( $repeat && date( 'Y', $from ) <= date( 'Y' ) ) {
			
				$futurefrom = strtotime( '+1 Year', $from );
				$futureto = strtotime( '+1 Year', $to );
				
				$from = date( 'd-m-Y', $futurefrom );
				$to = date( 'd-m-Y', $futureto );
				
				update_option( 'creare_christmas_settings_from', $from );
				update_option( 'creare_christmas_settings_to', $to );
				
			}
			
		}
	
	} 

}