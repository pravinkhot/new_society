<?php

namespace App\Models\Societies;

use App\Models\BaseModel;

class SocietyModel extends BaseModel
{
	use Society;
	
    protected $table = 'societies';
}