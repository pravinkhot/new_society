<?php

namespace App\Models\Expenses;

use Carbon\Carbon;

trait ExpenseAttribute
{
    /**
     * Set the bill date format.
     *
     * @param  string  $value
     * @return void
     */
    public function setBillDateAttribute($value)
    {
        $value = Carbon::parse($value)->toDateString();
        $this->attributes['bill_date'] = $value;
    }

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

    /**
     * Get the bill date in required format.
     *
     * @param  string  $value
     * @return string
     */
    public function getBillDateAttribute($value)
    {
        return Carbon::parse($value)->format(config('custom.defaultDateFormat'));
    }
}
