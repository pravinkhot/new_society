<?php

namespace App\Models\FlatStatus;

use App\Models\BaseModel;

class FlatStatusModel extends BaseModel
{
    use FlatStatus;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'flat_status';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}

