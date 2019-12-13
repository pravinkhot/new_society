<?php

namespace App\Models\Members;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait Member
{
    public function getMemberListWithPaginate(Request $request)
    {
        $query = self::query();
        $limit = $request->limit ?? config('custom.defaultPaginationCount');
        return $query->paginate($limit);
    }

    public function getMemberDetail(int $memberID)
    {
        return self::findOrFail($memberID);
    }

    public function saveMember(Request $request, int $memberID)
    {
        $memberObj = self::find($memberID) ?? new self();
        $memberObj->updated_by = \Auth::id();
        if (empty($memberObj->id)) {
            $memberObj->created_by = \Auth::id();
            $memberObj->password = Hash::make($this->randomPasswordGenerator());
        }

        $input = $request->all();
        $fields = [
            'first_name', 'last_name', 'email', 'gender', 'mobile_no', 'dob'
        ];
        foreach ($fields as $field) {
            if (isset($input[$field])) {
                $memberObj->$field = $input[$field];
            }
        }
        $memberObj->save();
        return $memberObj;
    }

    private function randomPasswordGenerator()
    {
        $allowedAlphabets = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $passwordAlphabets = [];
        $alphabetLength = strlen($allowedAlphabets) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphabetLength);
            $passwordAlphabets[] = $allowedAlphabets[$n];
        }
        return implode($passwordAlphabets);
    }
}
