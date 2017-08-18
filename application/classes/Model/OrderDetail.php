<?php defined('SYSPATH') or die('No direct script access.');

class Model_OrderDetail extends ORM {

	protected $_table_columns = array(
	'id' => NULL,
    'code' => NULL,
    'order_status' => NULL,
    'confirmation_date' => NULL,
	'shipping_date' => NULL,
	'delivery_date' => NULL,
	);
}
