<?php

namespace App\Models\Wings;

use Illuminate\Http\Request;

trait Wing
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function getWingListWithPaginate(Request $request)
    {
        $query = self::query();
        $limit = $request->limit ?? config('custom.defaultPaginationCount');
        return $query->paginate($limit);
    }

    /**
     * @param int $wingID
     * @return mixed
     */
    public function getWingDetail(int $wingID)
    {
        return self::findOrFail($wingID);
    }

    /**
     * @param Request $request
     * @param int $wingID
     * @return Wing|WingModel
     */
    public function saveWing(Request $request, int $wingID)
    {
        $wingObj = self::find($wingID) ?? new self();
        $wingObj->updated_by = \Auth::id();
        $wingObj->society_id = $request->session()->get('user.society_id');

        if (empty($wingObj->id)) {
            $wingObj->created_by = \Auth::id();
        }

        $input = $request->all();
        $fields = [
            'name', 'description'
        ];

        foreach ($fields as $field) {
            if (isset($input[$field])) {
                $wingObj->$field = $input[$field];
            }
        }

        $wingObj->save();

        return $wingObj;
    }
}
