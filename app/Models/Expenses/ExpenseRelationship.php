<?php

namespace App\Models\Expenses;

trait ExpenseRelationship
{
    /**
     * Get associated category with this expense.
     */
    public function getExpenseCategory()
    {
        return $this->belongsTo('App\Models\ExpenseCategory', 'expense_category_id');
    }

    /**
     * Get associated created by with this expense.
     */
    public function getCreatedByUser()
    {
        return $this->belongsTo('App\Models\Members\MemberModel', 'created_by');
    }
}
