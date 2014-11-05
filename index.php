<?php
/*
Plugin Name: AJAX speed tester
Plugin URI: #
Description: Logs the response speed of a regular HTTP request for a static file.
Author: Mark Howells-Mead
Version: 1.0
Author URI: http://permanenttourist.ch/
*/


class MHM_Speedtest {

	public $key 	= 'mhm-wp-speedtest';
	public $version = '1.0';

	/////////////////////////////////////////////
	
	public function __construct(){
		add_action('wp_enqueue_scripts', array(&$this,'add_scripts'));
		add_action('wp_ajax_log_speed', array(&$this,'log_speed'));
		add_action('wp_ajax_nopriv_log_speed', array(&$this,'log_speed'));
	}//__construct

	/////////////////////////////////////////////
	
	public function add_scripts(){
		wp_enqueue_script($this->key, plugins_url( $this->key.'/assets/speed.js' , dirname(__FILE__) ), null, $this->version, true);
		wp_localize_script($this->key, 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
	}//add_scripts
	

	//////////////////////////////////////////////////
	
	public function log_speed(){
		$logdir = $_SERVER['DOCUMENT_ROOT'].'/wp-content/uploads/mhm-wp-speedtest/' . date('Ymd');
		if(!is_dir($logdir)){
			mkdir($logdir, 0755, true);
		}
		file_put_contents(
			$logdir.'/speed.' .date('H'). '.log',
			$_SERVER['REMOTE_ADDR'].chr(9).$_SERVER["HTTP_USER_AGENT"].chr(9).$_SERVER["HTTP_ACCEPT_LANGUAGE"].chr(9).strval($_POST['bps']).PHP_EOL,
			FILE_APPEND
		);		
	}

}

new MHM_Speedtest();