<?php

namespace App\Models\Members;

use App\Models\BaseModel;

class MemberModel extends BaseModel
{
    use Member, MemberAttribute, MemberRelationship;

    protected $table = 'users';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
