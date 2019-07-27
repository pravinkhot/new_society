<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }

    /**
     * Get associated society with this wing.
     */
    public function society()
    {
        return $this->belongsTo('App\Models\Society');
    }
}
