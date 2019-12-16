<?php

namespace App\Models\Roles;

trait RoleRelationship
{
    /**
     * Get the role permission list for the role.
     */
    public function getRolePermissions()
    {
        return $this->hasMany('App\Models\Roles\Permissions\PermissionModel', 'role_id');
    }
}
