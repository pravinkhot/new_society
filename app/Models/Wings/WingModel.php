<?php

namespace App\Models\Wings;

use App\Models\BaseModel;

class WingModel extends BaseModel
{
    use Wing, WingAttribute, WingRelationship;

    protected $table = 'wings';
}
