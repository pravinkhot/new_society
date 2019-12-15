<?php

namespace App\Models\MemberSociety;

trait MemberSocietyRelationship
{
    public function getRoleDetails()
    {
        return $this->belongsTo('App\Models\Roles\RoleModel', 'role_id');
    }

    public function getSocietyDetails()
    {
        return $this->belongsTo('App\Models\Societies\SocietyModel', 'society_id');
    }
}
