<?php

namespace App\Models\Charges\BillGroup\Particular;

use App\Models\Charges\BillGroup\BillGroupModel;
use Illuminate\Http\Request;

trait Particular
{
    /**
     * @param Request $request
     * @param BillGroupModel $billGroupModelObj
     * @return BillGroupModel
     */
    public function saveParticulars (Request $request, BillGroupModel $billGroupModelObj)
    {
        $particularObj = new ParticularModel();

        $particularObj->where([
            'bill_group_id' => $billGroupModelObj->id,
        ])->delete();

        $particulars = $request->input('particular') ?? [];
        $amounts = $request->input('amount') ?? [];

        $newParticulars = [];
        foreach ($particulars as $particularKey => $particular) {
            $newParticulars[] = new ParticularModel([
                'bill_group_id' => 1,
                'society_id' => $request->session()->get('user.society_id'),
                'name' => $particular,
                'amount' => $amounts[$particularKey] ?? null,
            ]);
        }

        $billGroupModelObj->particulars()->savemany($newParticulars);

        return $billGroupModelObj;
    }
}
