<?php

namespace App\Models\Services;

use App\Models\BaseModel;

class ServiceModel extends BaseModel
{
    use Service;

    protected $table = 'services';

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }
}
