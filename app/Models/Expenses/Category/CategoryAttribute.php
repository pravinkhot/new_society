<?php

namespace App\Models\Expenses\Category;

trait CategoryAttribute
{
    /**
     * Set category status value.
     *
     * @param  int  $value
     * @return void
     */
    public function setStatusAttribute(int $value)
    {
        $this->attributes['status'] = (boolean)$value;
    }

    /**
     * Casting column value to boolean
     *
     * @param int $value
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
    public function getStatusNameAttribute(): string
    {
        return $this->status === true ? "Active" : "Inactive";
    }
}
