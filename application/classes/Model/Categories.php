<?php defined('SYSPATH') or die('No direct script access.');

class Model_Categories extends ORM {

	protected $_table_name = 'categories';
	protected $_table_columns = array(
	'id' => NULL,
    'name' => NULL,
    'description' => NULL,
	'market_id' => NULL
	);
}

?> 