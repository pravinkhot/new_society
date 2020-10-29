<?php

namespace App\Models\Members\Flat;

use App\Models\BaseModel;

class FlatModel extends BaseModel
{
    use Flat;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_flat';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'user_id', 'society_id', 'flat_id', 'owner_tenant' ];
}
