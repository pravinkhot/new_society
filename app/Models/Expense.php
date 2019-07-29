<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Expense extends Model
{
    public function newQuery($excludeDeleted = true) {
        return parent::newQuery($excludeDeleted)
            ->where([
                'society_id' => \Session::get('user.society_id')
            ]);
    }

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
     * Get the bill date.
     *
     * @param  string  $value
     * @return string
     */
    public function getBillDateAttribute($value)
    {
        return Carbon::parse($value)->format(config('custom.defaultDateFormat'));
    }

    /**
     * Get the payment date.
     *
     * @param  string  $value
     * @return string
     */
    public function getPaymentDateAttribute($value)
    {
        return Carbon::parse($value)->format(config('custom.defaultDateFormat'));
    }

    /**
     * Get associated category with this expense.
     */
    public function getExpenseCategory()
    {
        return $this->belongsTo('App\Models\ExpenseCategory', 'expense_category_id');
    }

    /**
     * Get associated created by with this expense.
     */
    public function getCreatedByUser()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
