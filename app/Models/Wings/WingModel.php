<?php

namespace App\Models\Wings;

use App\Models\BaseModel;

class WingModel extends BaseModel
{
    use Wing, WingAttribute, WingRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }
}
