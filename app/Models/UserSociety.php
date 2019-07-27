<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSociety extends Model
{
    protected $table = 'user_society';

    /**
     * Get associated society with this wing.
     */
    public function getSocietyDetail()
    {
        return $this->belongsTo('App\Models\Society', 'society_id');
    }
}
