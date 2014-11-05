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

	public $key 	= 'mhm-speedtest';
	public $version = '1.0';

	/////////////////////////////////////////////
	
	public function __construct(){
		add_action('wp_enqueue_scripts', array(&$this,'add_scripts'));
	}//__construct

	/////////////////////////////////////////////
	
	public function add_scripts(){
		wp_enqueue_script($this->key, plugins_url( $this->key.'/assets/speed.min.js' , dirname(__FILE__) ), null, $this->version, true);
	}//add_scripts

}

new MHM_Speedtest();