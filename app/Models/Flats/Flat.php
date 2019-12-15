<?php

namespace App\Models\Flats;

use Illuminate\Http\Request;

trait Flat
{
    public function getFlatListWithPaginate(Request $request)
    {
        $query = self::query();
        $limit = $request->limit ?? config('custom.defaultPaginationCount');
        return $query->paginate($limit);
    }

    public function getFlatDetail(int $flatID)
    {
        return self::findOrFail($flatID);
    }

    public function saveFlat(Request $request, int $flatID)
    {
        $flatObj = self::find($flatID) ?? new self();
        $flatObj->updated_by = \Auth::id();
        $flatObj->society_id = $request->session()->get('user.society_id');
        if (empty($flatObj->id)) {
            $flatObj->created_by = \Auth::id();
        }

        $input = $request->all();
        $fields = [
            'wing_id', 'flat_status_id', 'flat_no', 'sq_foot', 'intercom', 'owner_fn', 'owner_ln', 'owner_number'
        ];
        foreach ($fields as $field) {
            if (isset($input[$field])) {
                $flatObj->$field = $input[$field];
            }
        }
        $flatObj->save();
        return $flatObj;
    }
}
