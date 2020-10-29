<?php

namespace App\Models\FlatStatus;

trait FlatStatus
{
    public function getFlatStatusWithNameAndId()
    {
        return self::query()
            ->pluck('name', 'id')
            ->toArray();
    }
}
