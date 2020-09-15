<?php

namespace App\Models\Charges\BillGroup;

trait BillGroupRelationship
{
    /**
     * Get the particulars for the bill group.
     */
    public function particulars()
    {
        return $this->hasMany('App\Models\Charges\BillGroup\Particular\ParticularModel', 'bill_group_id', 'id');
    }
}
