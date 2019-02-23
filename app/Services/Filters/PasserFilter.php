<?php

namespace App\Services\Filters;

use App\Services\Filters\FullTextFilter;

class PasserFilter extends Filter
{
    use FullTextFilter;

    protected $searchable = [
        'name',
        'school',
        'division'
    ];

    protected function passer($name)
    {
        $passer = Passer::whereName($name)->first();

        $passerId = $passer ? $passer->id : null;

        return $this->builder->wherePasserId($passerId);
    }
}
