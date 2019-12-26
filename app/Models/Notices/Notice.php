<?php

namespace App\Models\Notices;

use Illuminate\Http\Request;
use App\Helpers\CommonFunction;

trait Notice
{
    public function getNoticeListWithPaginate(Request $request)
    {
        $limit = $request->limit ?? config('custom.defaultPaginationCount');
        return self::query()
                ->orderBy(
                    config('custom.defaultOrderByForList.columnName'),
                    config('custom.defaultOrderByForList.type')
                )
                ->paginate($limit);
    }

    public function getNoticeDetail(int $noticeID)
    {
        return self::findOrFail($noticeID);
    }

    public function saveNotice(Request $request, int $noticeID)
    {
        $noticeObj = self::find($noticeID) ?? new self();
        $noticeObj->updated_by = \Auth::id();
        $noticeObj->society_id = $request->session()->get('user.society_id');
        if (empty($noticeObj->id)) {
            $noticeObj->created_by = \Auth::id();
        }

        $input = $request->all();
        $fields = [
            'title', 'type', 'end_date', 'description'
        ];
        foreach ($fields as $field) {
            if (isset($input[$field])) {
                $noticeObj->$field = $input[$field];
            }
        }
        $noticeObj->save();

        //Save Notice uploaded file
        if ($request->hasFile('document')) {
            $fileName = CommonFunction::storeFile(
                $request->file('document'), [
                    'entityName' => 'notice',
                    'fileNameId' => $noticeObj->id
                ]
            );
            $noticeObj->document = $fileName;
            $noticeObj->save();
        }
        return $noticeObj;
    }
}
