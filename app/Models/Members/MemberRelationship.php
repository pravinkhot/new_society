<?php

namespace App\Models\Members;

trait MemberRelationship
{
    /**
     * @return mixed
     */
    public function getUserSocietyDetails()
    {
        return $this->hasOne('App\Models\MemberSociety\MemberSocietyModel', 'user_id');
    }

    public function getUserFlatDetails()
    {
        return $this->hasMany('App\Models\Members\Flat\FlatModel', 'user_id');
    }
}
