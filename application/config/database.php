<?php defined('SYSPATH') OR die('No direct access allowed.');
	
	return array
	(
	    'default' => array(
	        'type'       => 'PDO',
	        'connection' => array(            
	            'dsn'        => 'mysql:host=localhost;dbname=scrapjunction',
	            'username'   => 'root',
	            'password'   => '',
	            'persistent' => FALSE,
	        ),
	        'table_prefix' => '',
	        'charset'      => 'utf8',
	        'caching'      => FALSE,
	    ),
	);
