<?php defined('SYSPATH') or die('No direct script access.');

class Model_RoleUser extends ORM {

	protected $_table_name = 'roles_users';
	protected $_table_columns = array(
	'role_id' => NULL,
    'user_id' => NULL,
	);
}

?> 