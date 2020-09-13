<?php

namespace App\Models\Charges\BillGroup\Particular;

use App\Models\BaseModel;

class ParticularModel extends BaseModel
{
    use Particular;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bill_group_particulars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'bill_group_id', 'society_id', 'name', 'amount' ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }
}
