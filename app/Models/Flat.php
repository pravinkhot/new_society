<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }

    /**
     * Get the owner full name.
     *
     * @return string
     */
    public function getOwnerFullNameAttribute()
    {
        return "{$this->owner_fn} {$this->owner_ln}";
    }

    /**
     * Get associated wing with this flat.
     */
    public function getFlatWing()
    {
        return $this->belongsTo('App\Models\Wing', 'wing_id');
    }

    /**
     * Get associated wing with this flat.
     */
    public function getFlatStatus()
    {
        return $this->belongsTo('App\Models\FlatStatus', 'flat_status_id');
    }
}
