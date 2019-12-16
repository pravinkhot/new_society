<?php

namespace App\Models\Roles;

use Illuminate\Http\Request;

trait Role
{
    public function getRoleWithIdAndName()
    {
        return self::orderBy('name', 'ASC')
                ->pluck('name', 'id')
                ->toArray();
    }
}