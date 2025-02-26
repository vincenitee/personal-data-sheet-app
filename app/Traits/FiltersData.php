<?php

namespace App\Traits;

trait FiltersData
{
    protected function filterData($array, $fields = [])
    {
        if (in_array('timestamps', $fields)) {
            $fields = array_merge(array_diff($fields, ['timestamps']), ['created_at', 'updated_at']);
        }

        return collect($array)
            ->except([...$fields])
            ->toArray();
    }
}
