<?php

namespace App\Models\Services;

use Illuminate\Http\Request;

trait Service
{
    public function getServiceListWithPaginate(Request $request)
    {
        $limit = $request->limit ?? config('custom.defaultPaginationCount');
        return self::query()
                ->orderBy(
                    config('custom.defaultOrderByForList.columnName'),
                    config('custom.defaultOrderByForList.type')
                )
                ->paginate($limit);
    }

    public function getServiceDetail(int $serviceID)
    {
        return self::findOrFail($serviceID);
    }

    public function saveService(Request $request, int $serviceID)
    {
        $serviceObj = self::find($serviceID) ?? new self();
        $serviceObj->updated_by = \Auth::id();
        $serviceObj->society_id = $request->session()->get('user.society_id');
        if (empty($serviceObj->id)) {
            $serviceObj->created_by = \Auth::id();
        }

        $input = $request->all();
        $fields = [
            'name', 'provider_name', 'mobile_no', 'alternate_mobile_no', 'email', 'category', 'address'
        ];
        foreach ($fields as $field) {
            if (isset($input[$field])) {
                $serviceObj->$field = $input[$field];
            }
        }
        $serviceObj->save();
        return $serviceObj;
    }
}
