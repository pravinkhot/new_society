<?php

namespace App\Models\Notices;

use App\Models\BaseModel;

class NoticeModel extends BaseModel
{
    use Notice;

    protected $table = 'notices';
}
