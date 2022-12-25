<?php
/**
 * Plugin Name: WooCommerce PayKeeper Plugin
 * Plugin URI: https://paykeeper.ru/paykeeper/usage/cms/
 * Description: Easily adds PayKeeper payment gateway to the WooCommerce plugin so you can allow customers to checkout PayKeeper gateway.
 * Version: 1.1
 * Author: asdat
 * Author URI: http://asdat.org
 * Requires at least: 4.2
 * License: GPL2 or Later
 */

if (!defined('ABSPATH')) {
    //Exit if accessed directly
    exit;
}


if (!class_exists('WC_PayKeeper_Gateway_Addon')) {

	class WC_PayKeeper_Gateway_Addon {

		var $version = '1.1';
		var $db_version = '1.1';
		var $plugin_url;
		var $plugin_path;

		function __construct() {
			$this->define_constants();
			$this->loader_operations();
			add_action('init', array(&$this, 'plugin_init'), 0);
		}

		function define_constants() {
			define('WC_PK_ADDON_VERSION', $this->version);
			define('WC_PK_ADDON_URL', $this->plugin_url());
			define('WC_PK_ADDON_PATH', $this->plugin_path());
		}

		function includes() {
			include_once('paykeeper-gateway-class.php');
		}

		function loader_operations() {
			add_action('plugins_loaded', array(&$this, 'plugins_loaded_handler')); //plugins loaded hook		
		}

		function plugins_loaded_handler() {
			//Runs when plugins_loaded action gets fired
			include_once('paykeeper-gateway-class.php');
			add_filter('woocommerce_payment_gateways', array(&$this, 'init_paykeeper_gateway'));
		}

		function do_db_upgrade_check() {
			//NOP
		}

		function plugin_url() {
			if ($this->plugin_url)
				return $this->plugin_url;
			return $this->plugin_url = plugins_url(basename(plugin_dir_path(__FILE__)), basename(__FILE__));
		}

		function plugin_path() {
			if ($this->plugin_path)
				return $this->plugin_path;
			return $this->plugin_path = untrailingslashit(plugin_dir_path(__FILE__));
		}

		function plugin_init() {
			//NOP
		}

		function init_paykeeper_gateway($methods) {
			array_push($methods, 'WC_PK_Gateway');
			return $methods;
		}
	}
}

$GLOBALS['WC_PayKeeper_Gateway_Addon'] = new WC_PayKeeper_Gateway_Addon();
