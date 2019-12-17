<?php

namespace App\Models\Notices;

use Illuminate\Http\Request;

trait Notice
{
    public function getNoticeListWithPaginate(Request $request)
    {
        $limit = $request->limit ?? config('custom.defaultPaginationCount');
        $query = self::query()
                ->orderBy(
                    config('custom.defaultOrderByForList.columnName'),
                    config('custom.defaultOrderByForList.type')
                )
                ->paginate($limit);
    }
}
