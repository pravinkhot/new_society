<?php

namespace App\Models\Notices;

use Carbon\Carbon;

trait NoticeAttribute
{
    /**
     * Set the end date format.
     *
     * @param  string  $value
     * @return void
     */
    public function setEndDateAttribute($value)
    {
        $value = Carbon::parse($value)->toDateString();
        $this->attributes['end_date'] = $value;
    }
    
    /**
     * Get end date in required format.
     *
     * @return string
     */
    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format(config('custom.defaultDateFormat'));
    }
}
