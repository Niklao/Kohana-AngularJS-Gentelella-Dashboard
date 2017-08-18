<?php defined('SYSPATH') or die('No direct script access.');

class Model_OrderedProduct extends ORM {

	protected $_table_columns = array(
	'id' => NULL,
    'order_id' => NULL,
    'product_id' => NULL,
    'quantity' => NULL,
	);
}
