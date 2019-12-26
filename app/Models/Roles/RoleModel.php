<?php

namespace App\Models\Roles;

use App\Models\BaseModel;

class RoleModel extends BaseModel
{
    use Role, RoleRelationship;
    
    protected $table = 'roles';

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }
}
