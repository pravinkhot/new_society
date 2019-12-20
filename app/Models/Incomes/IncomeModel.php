<?php

namespace App\Models\Incomes;

use App\Models\BaseModel;

class IncomeModel extends BaseModel
{
    use Income, IncomeAttribute, IncomeRelationship;

    protected $table = 'incomes';
    
    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }
}
