<?php

namespace App\Models\Flats;

use App\Models\BaseModel;

class FlatModel extends BaseModel
{
	use Flat, FlatAttribute, FlatRelationship;

    protected $table = 'flats';
    
    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }
}
