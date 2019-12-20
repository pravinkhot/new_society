<?php

namespace App\Models\Incomes;

trait IncomeRelationship
{
    /**
     * Get associated category with this income.
     */
    public function getIncomeCategory()
    {
        return $this->belongsTo('App\Models\Incomes\Category\CategoryModel', 'income_category_id');
    }
}
