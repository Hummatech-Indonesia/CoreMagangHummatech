<?php

namespace App\Helpers;

class SearchHelper
{
    public static function apply($query, $search, array $columns, $limit = 10)
    {
        if ($search) {
            $query->where(function ($query) use ($search, $columns) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'LIKE', "%{$search}%");
                }
            });
        }

        return $query->limit($limit);
    }
}