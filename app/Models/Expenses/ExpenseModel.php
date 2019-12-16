<?php

namespace App\Models\Expenses;

use App\Models\BaseModel;

class ExpenseModel extends BaseModel
{
	use Expense, ExpenseAttribute, ExpenseRelationship;
	
    protected $table = 'expenses';

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }
}
