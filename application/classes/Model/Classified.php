<?php defined('SYSPATH') or die('No direct script access.');

class Model_Classified extends ORM {

	protected $_table_columns = array(
	'id' => NULL,
    'sku' => NULL,
    'title' => NULL,
    'address' => NULL,
	'shortdescrip' => NULL,
	'videourl' => NULL,
	'contactone' => NULL,
	'contacttwo' => NULL,
	'owner' => NULL,
	'published' => NULL,
	'availabilitys' => NULL,
	'location' => NULL,
	'draft' => NULL,
	);
}
