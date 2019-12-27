<?php

namespace App\Models\Incomes\Category;

trait CategoryAttribute
{
    /**
     * Set the payment date format.
     *
     * @param  string  $value
     * @return void
     */
    public function setStatusAttribute(int $value)
    {
        $this->attributes['status'] = (boolean)$value;
    }

    /**
     * Casting column value to boolean
     *
     * @return boolean
     */
    public function getStatusAttribute(int $value): bool
    {
        return (boolean) $value;
    }

    /**
     * Get status name
     *
     * @return boolean
     */
    public function getStatusNameAttribute($value): string
    {
        return $this->status === true ? "Active" : "Inactive";
    }
}
