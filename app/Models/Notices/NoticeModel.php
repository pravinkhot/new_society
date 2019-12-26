<?php

namespace App\Models\Notices;

use App\Models\BaseModel;

class NoticeModel extends BaseModel
{
    use Notice, NoticeAttribute;

    protected $table = 'notices';

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }
}
