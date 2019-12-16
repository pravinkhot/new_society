<?php

namespace App\Models\Roles;

use App\Models\BaseModel;

class RoleModel extends BaseModel
{
	use Role;
	
    protected $table = 'roles';
}