<?php defined('SYSPATH') or die('No direct script access.');

class Model_Graphic extends ORM {

	protected $_table_columns = array(
	'id' => NULL,
    'name' => NULL,
    'path' => NULL,
    'description' => NULL,
	'published' => NULL,
	);
}
