<?php

namespace App\Models\MemberSociety;

use Illuminate\Http\Request;

trait MemberSociety
{
    public function getMemberAssociatedSocieties(Request $request)
    {
        return self::where([
            'user_id' => \Auth::id()
        ])->get();
    }
}