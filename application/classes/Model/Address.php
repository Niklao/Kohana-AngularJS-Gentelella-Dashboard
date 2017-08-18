<?php defined('SYSPATH') or die('No direct script access.');

class Model_Address extends ORM {

	protected $_table_name = 'addresses';
	protected $_table_columns = array(
	'id' => NULL,
    'address' => NULL,
    'mobo' => NULL,
    'mobt' => NULL,
    'lando' => NULL,
    'landt' => NULL,
	);
}

?> 