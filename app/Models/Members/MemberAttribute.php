<?php

namespace App\Models\Members;

use Carbon\Carbon;

trait MemberAttribute
{

	/**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Set the date of birth format.
     *
     * @param  string  $value
     * @return void
     */
    public function setDobAttribute($value)
    {
        $value = Carbon::parse($value)->toDateString();
        $this->attributes['dob'] = $value;
    }

    /**
     * Get dob in DD-MM-YYYY.
     *
     * @return string
     */
    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format(config('custom.defaultDateFormat'));
    }
}
