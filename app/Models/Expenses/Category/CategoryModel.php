<?php

namespace App\Models\Expenses\Category;

use App\Models\BaseModel;

class CategoryModel extends BaseModel
{
    use Category, CategoryAttribute;

    protected $table = 'expense_category';

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }
}
