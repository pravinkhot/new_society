<?php

namespace App\Models\Roles;

trait Role
{
    public function getRoleDetail(int $roleID)
    {
        return self::findOrFail($roleID);
    }

    public function getRoleWithIdAndName()
    {
        return self::orderBy('name', 'ASC')
                ->pluck('name', 'id')
                ->toArray();
    }
}
