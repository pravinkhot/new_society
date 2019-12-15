<?php

namespace App\Models\Flats;

trait FlatRelationship
{
    /**
     * Get associated wing with this flat.
     */
    public function getFlatStatus()
    {
        return $this->belongsTo('App\Models\FlatStatus', 'flat_status_id');
    }

    /**
     * Get associated wing with this flat.
     */
    public function getFlatWing()
    {
        return $this->belongsTo('App\Models\Wings\WingModel', 'wing_id');
    }
}
