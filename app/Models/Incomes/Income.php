<?php

namespace App\Models\Incomes;

use Illuminate\Http\Request;

trait Income
{
    public function getIncomeListWithPaginate(Request $request)
    {
        $limit = $request->limit ?? config('custom.defaultPaginationCount');
        return self::query()
                ->orderBy(
                    config('custom.defaultOrderByForList.columnName'),
                    config('custom.defaultOrderByForList.type')
                )
                ->paginate($limit);
    }

    public function getIncomeDetail(int $incomeID)
    {
        return self::findOrFail($incomeID);
    }

    public function saveIncome(Request $request, int $incomeID)
    {
        $incomeObj = self::find($incomeID) ?? new self();
        $incomeObj->updated_by = \Auth::id();
        $incomeObj->society_id = $request->session()->get('user.society_id');
        if (empty($incomeObj->id)) {
            $incomeObj->created_by = \Auth::id();
        }

        $input = $request->all();
        $fields = [
            'income_category_id', 'amount', 'payment_date', 'payment_mode_id', 'cheque_no', 'received_from'
        ];
        foreach ($fields as $field) {
            if (isset($input[$field])) {
                $incomeObj->$field = $input[$field];
            }
        }
        if ($input['payment_mode_id'] !== '2') {
            $incomeObj->cheque_no = '';
        }
        $incomeObj->save();
        return $incomeObj;
    }
}
