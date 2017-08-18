<?php defined('SYSPATH') or die('No direct script access.');

class Model_Product extends ORM {

	protected $_table_columns = array(
	'id' => NULL,
    'sku' => NULL,
    'name' => NULL,
    'brandid' => NULL,
	'dimension' => NULL,
	'materialdescrip' => NULL,
	'shortdescrip' => NULL,
	'videourl' => NULL,
	'color' => NULL,
	'style' => NULL,
	'warranty' => NULL,
	'price' => NULL,
	'published' => NULL,
	'availabilityd' => NULL,
	'availabilitys' => NULL,
	'draft' => NULL,
	);
}
