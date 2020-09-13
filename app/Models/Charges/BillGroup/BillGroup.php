<?php

namespace App\Models\Charges\BillGroup;

use Illuminate\Http\Request;

use App\Models\Charges\BillGroup\Particular\ParticularModel;

trait BillGroup
{
    /**
     * @return mixed
     */
    public function getChargeBillGroupWithPaginate()
    {
        $query = self::query();
        $limit = $request->limit ?? config('custom.defaultPaginationCount');
        return $query->paginate($limit);
    }

    /**
     * @param int $billGroupID
     * @return mixed
     */
    public function getBillGroupDetail(int $billGroupID)
    {
        return self::findOrFail($billGroupID);
    }

    /**
     * Get the particulars for the bill group.
     */
    public function particulars()
    {
        return $this->hasMany('App\Models\Charges\BillGroup\Particular\ParticularModel', 'bill_group_id', 'id');
    }

    /**
     * @param Request $request
     * @param int $billGroupID
     * @return BillGroup
     */
    public function saveBillGroup(Request $request, int $billGroupID)
    {
        $billGroupModelObj = self::find($billGroupID) ?? new self();
        $billGroupModelObj->updated_by = \Auth::id();
        $billGroupModelObj->society_id = $request->session()->get('user.society_id');

        if (empty($billGroupModelObj->id)) {
            $billGroupModelObj->created_by = \Auth::id();
        }

        $billGroupModelObj->name = $request->input('name') ?? '';
        $billGroupModelObj->save();

        $particularModelObj = new ParticularModel();
        $particularModelObj->saveParticulars($request, $billGroupModelObj);

        return $billGroupModelObj;
    }
}
