<?php

namespace App\Models\Incomes;

use Carbon\Carbon;

trait IncomeAttribute
{
    /**
     * Set the payment date format.
     *
     * @param  string  $value
     * @return void
     */
    public function setPaymentDateAttribute($value)
    {
        $value = Carbon::parse($value)->toDateString();
        $this->attributes['payment_date'] = $value;
    }
    
    /**
     * Get payment date in required format.
     *
     * @return string
     */
    public function getPaymentDateAttribute($value)
    {
        return Carbon::parse($value)->format(config('custom.defaultDateFormat'));
    }
}
