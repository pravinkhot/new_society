<?php

namespace App\Models\Incomes\Category;

use Illuminate\Http\Request;

trait Category
{
    public function getIncomeCategoryWithNameAndId()
    {
        return self::query()
            ->where('status', 1)
            ->pluck('name', 'id')
            ->toArray();
    }

    public function getIncomeCategoryListWithPaginate(Request $request)
    {
        $limit = $request->limit ?? config('custom.defaultPaginationCount');
        return self::query()
                ->orderBy(
                    config('custom.defaultOrderByForList.columnName'),
                    config('custom.defaultOrderByForList.type')
                )
                ->paginate($limit);
    }

    public function getIncomeCategoryDetail(int $incomeCategoryID)
    {
        return self::findOrFail($incomeCategoryID);
    }

    public function saveIncomeCategory(Request $request, int $incomeCategoryID)
    {
        $incomeCatgoryObj = self::find($incomeCategoryID) ?? new self();
        $incomeCatgoryObj->updated_by = \Auth::id();
        $incomeCatgoryObj->society_id = $request->session()->get('user.society_id');
        if (empty($incomeCatgoryObj->id)) {
            $incomeCatgoryObj->created_by = \Auth::id();
        }

        $input = $request->all();
        $fields = [
            'name', 'status'
        ];
        foreach ($fields as $field) {
            if (isset($input[$field])) {
                $incomeCatgoryObj->$field = $input[$field];
            }
        }
        $incomeCatgoryObj->save();
        return $incomeCatgoryObj;
    }
}
