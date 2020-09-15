<?php

namespace App\Models\Charges\BillGroup;

use App\Models\BaseModel;

class BillGroupModel extends BaseModel
{
    use BillGroup, BillGroupRelationship;

    /** @var string $table */
    protected $table = 'bill_group';

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }
}
