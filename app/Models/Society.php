<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    //

    /**
     * Get associated country with this society.
     */
    public function getCountryDetail()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
