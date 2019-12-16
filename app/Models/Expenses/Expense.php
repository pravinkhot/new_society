<?php

namespace App\Models\Expenses;

use Illuminate\Http\Request;

trait Expense
{
	public function getExpenseListWithPaginate(Request $request)
    {
        $query = self::query();
        $limit = $request->limit ?? config('custom.defaultPaginationCount');
        return $query->paginate($limit);
    }

    public function getExpenseDetail(int $expenseID)
    {
        return self::findOrFail($expenseID);
    }

    public function saveExpense(Request $request, int $expenseID)
    {
        $expenseObj = self::find($expenseID) ?? new self();
        $expenseObj->updated_by = \Auth::id();
        $expenseObj->society_id = $request->session()->get('user.society_id');
        if (empty($expenseObj->id)) {
            $expenseObj->created_by = \Auth::id();
        }

        $input = $request->all();
        $fields = [
            'authorised_by', 'expense_category_id', 'amount', 'vendor_name', 'bill_date', 'payment_date', 'payment_mode_id', 'cheque_no', 'description'
        ];
        foreach ($fields as $field) {
            if (isset($input[$field])) {
                $expenseObj->$field = $input[$field];
            }
        }
        $expenseObj->save();
        return $expenseObj;
    }
}
