<?php

namespace App\Models\Members\Flat;

use Illuminate\Http\Request;
use App\Models\Members\MemberModel;

trait Flat
{
    /**
     * @param Request $request
     * @param MemberModel $memberModelObj
     * @return MemberModel
     */
    public function saveUserFlat (Request $request, MemberModel $memberModelObj)
    {
        self::where([
                'user_id' => $memberModelObj->id,
                'society_id' => $request->session()->get('user.society_id'),
            ])->delete();

        $flatList = $request->input('flat_id') ?? [];
        $otList = $request->input('ot') ?? [];

        $newFlats = [];
        foreach ($flatList as $flatKey => $flat) {
            $newFlats[] = new self([
                'user_id' => $memberModelObj->id,
                'society_id' => $request->session()->get('user.society_id'),
                'flat_id' => $flat,
                'owner_tenant' => $otList[$flatKey] ?? 1,
            ]);
        }

        $memberModelObj->getUserFlatDetails()->savemany($newFlats);

        return $memberModelObj;
    }
}
