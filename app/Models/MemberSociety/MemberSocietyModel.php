<?php

namespace App\Models\MemberSociety;

use App\Models\BaseModel;

class MemberSocietyModel extends BaseModel
{
    use MemberSociety, MemberSocietyRelationship;
    
    protected $table = 'user_society';
}
