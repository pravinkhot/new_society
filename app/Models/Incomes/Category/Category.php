<?php

namespace App\Models\Incomes\Category;

trait Category
{
    public function getIncomeCategoryWithNameAndId()
    {
        return self::query()
            ->where('status', 1)
            ->pluck('name', 'id')
            ->toArray();
    }
}
