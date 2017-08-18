<?php defined('SYSPATH') or die('No direct script access.');

class Model_Sub extends ORM {

	protected $_table_name = 'sub';
	protected $_table_columns = array(
	'id' => NULL,
    'categoryid' => NULL,
    'productid' => NULL,
	'marketid'=> NULL,
	);
}

?> 