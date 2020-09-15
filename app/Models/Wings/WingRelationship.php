<?php

namespace App\Models\Wings;

trait WingRelationship
{
    /**
     * Get associated society with this wing.
     */
    public function society()
    {
        return $this->belongsTo('App\Models\Societies\SocietyModel');
    }
}
