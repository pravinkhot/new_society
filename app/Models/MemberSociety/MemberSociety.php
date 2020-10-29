<?php

namespace App\Models\MemberSociety;

use Illuminate\Http\Request;
use App\Models\Members\MemberModel;

trait MemberSociety
{
    public function getMemberAssociatedSocieties(Request $request)
    {
        return self::where([
            'user_id' => \Auth::id()
        ])->get();
    }

    /**
     * @param Request $request
     * @param MemberModel $memberModelObj
     * @return MemberSociety
     */
    public function saveUserSociety (Request $request, MemberModel $memberModelObj)
    {
        $userSocietyObj = self::where([
                'user_id' => $memberModelObj->id,
                'society_id' => $request->session()->get('user.society_id'),
            ])->first() ?? new self();

        $userSocietyObj->user_id = $memberModelObj->id;
        $userSocietyObj->society_id = $request->session()->get('user.society_id');
        $userSocietyObj->is_association_member = $request->input('is_association_member') ?? 0;
        $userSocietyObj->designation = 1 === (int)$request->input('is_association_member') ? $request->input('designation') ?? null : '';
        $userSocietyObj->is_admin = $request->input('is_admin') ?? 0;

        $userSocietyObj->save();

        return $userSocietyObj;
    }
}
