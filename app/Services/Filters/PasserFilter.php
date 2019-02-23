<?php

namespace App\Services\Filters;

class PasserFilter extends Filter
{
    protected function passer($name)
    {
        $passer = Passer::whereName($name)->first();

        $passerId = $passer ? $passer->id : null;

        return $this->builder->wherePasserId($passerId);
    }
}
