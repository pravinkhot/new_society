<?php

namespace App\Models\Services;

use App\Models\BaseModel;

class ServiceModel extends BaseModel
{
    use Service;
    
    protected $table = 'services';
}
