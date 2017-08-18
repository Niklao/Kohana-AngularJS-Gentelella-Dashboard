<?php defined('SYSPATH') or die('No direct script access.');

class Model_Color extends ORM {

	protected $_primary_key = 'cid';
	protected $_table_columns = array(
	'pid' => NULL,
    'name' => NULL,
    'cid' => NULL,
    'colorhash' => NULL,
	);
}

?> 