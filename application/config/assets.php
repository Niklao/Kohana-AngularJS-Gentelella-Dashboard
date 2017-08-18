<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Don't know what all of this means? Check out the wiki on GitHub:
 * 
 * @see http://wiki.github.com/jonathangeiger/kohana-asset/configuration
 */
return array(
	
	/**
	 * Config for calls to asset::javascripts()
	 */
	'javascripts' => array
	(
		'hosts' => array(),
		'root' => DOCROOT,
		'prefix' => '/assets/js/',
		'extension' => '.js',
		'cache' => 'assets/cache/javascript-min.js',
		'compressor' => 'jsminplus',
		'compressor_options' => NULL,
		'cache_bust' => TRUE,
	),
	
	/**
	 * Config for calls to asset::stylesheets()
	 */
	'stylesheets' => array
	(
		'hosts' => array(),
		'root' => DOCROOT,
		'prefix' => '/assets/css/',
		'extension' => '.css',
		'cache' => 'assets/cache/stylesheet-min.css',
		'compressor' => NULL,
		'compressor_options' => NULL,
		'cache_bust' => TRUE,
	),
	
	/**
	 * Options for configuring YUI Compressor
	 * 
	 * @see http://wiki.github.com/jonathangeiger/kohana-asset/yui-compressor
	 */
	'yui' => array
	(
		'java' => 'java',
		'jar' => MODPATH.'asset/vendor/yui/yuicompressor-2.4.2.jar',
	)
);
