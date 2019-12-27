<?php

namespace App\Models\Incomes\Category;

use App\Models\BaseModel;

class CategoryModel extends BaseModel
{
    use Category, CategoryAttribute;

    protected $table = 'income_category';
    
    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }
}
