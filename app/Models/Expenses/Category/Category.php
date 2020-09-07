<?php

namespace App\Models\Expenses\Category;

use Illuminate\Http\Request;

trait Category
{
    /**
     * @return mixed
     */
    public function getExpenseCategoryWithNameAndId()
    {
        return self::query()
            ->where('status', 1)
            ->pluck('name', 'id')
            ->toArray();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getExpenseCategoryListWithPaginate(Request $request)
    {
        $limit = $request->limit ?? config('custom.defaultPaginationCount');
        return self::query()
                ->orderBy(
                    config('custom.defaultOrderByForList.columnName'),
                    config('custom.defaultOrderByForList.type')
                )
                ->paginate($limit);
    }

    /**
     * @param int $expenseCategoryID
     * @return mixed
     */
    public function getExpenseCategoryDetail(int $expenseCategoryID)
    {
        return self::findOrFail($expenseCategoryID);
    }

    /**
     * @param Request $request
     * @param int $expenseCategoryID
     * @return Category
     */
    public function saveExpenseCategory(Request $request, int $expenseCategoryID)
    {
        $expenseCategoryObj = self::find($expenseCategoryID) ?? new self();
        $expenseCategoryObj->updated_by = \Auth::id();
        $expenseCategoryObj->society_id = $request->session()->get('user.society_id');

        if (empty($expenseCategoryObj->id)) {
            $expenseCategoryObj->created_by = \Auth::id();
        }

        $input = $request->all();
        $fields = [
            'name', 'status'
        ];

        foreach ($fields as $field) {
            if (isset($input[$field])) {
                $expenseCategoryObj->$field = $input[$field];
            }
        }

        $expenseCategoryObj->save();
        return $expenseCategoryObj;
    }
}
