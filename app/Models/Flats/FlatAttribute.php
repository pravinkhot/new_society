<?php

namespace App\Models\Flats;

trait FlatAttribute
{
	/**
     * Get the owner full name.
     *
     * @return string
     */
    public function getOwnerFullNameAttribute()
    {
        return "{$this->owner_fn} {$this->owner_ln}";
    }
}
