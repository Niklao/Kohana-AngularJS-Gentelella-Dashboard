<?php defined('SYSPATH') or die('No direct script access.');

class Model_Review extends ORM {

	
	protected $_table_columns = array(
	'id' => NULL,
    'productid' => NULL,
    'nickname' => NULL,
    'summary' => NULL,
	'review' => NULL,
	'rating' => NULL,
	'datetime' => NULL,
	);
}
