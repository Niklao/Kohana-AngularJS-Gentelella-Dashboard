<?php defined('SYSPATH') or die('No direct script access.');

class Model_Image extends ORM {

	protected $_primary_key = 'imageid';
	protected $_table_columns = array(
	'colorid' => NULL,
    'path' => NULL,
    'imageid' => NULL,
	);
}
