<?php defined('SYSPATH') or die('No direct script access.');

class Model_OrderContactDetail extends ORM {

	protected $_table_columns = array(
	'id' => NULL,
    'order_id' => NULL,
    'first_name' => NULL,
    'last_name' => NULL,
	'email_id' => NULL,
	'telephone' => NULL,
	'address_line_one' => NULL,
	'address_line_two' => NULL,
	'city' => NULL,
	'pincode' => NULL,
	);
}
