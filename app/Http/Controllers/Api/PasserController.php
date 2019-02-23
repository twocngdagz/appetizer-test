<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Passer;
use App\Services\Filters\PasserFilter;
use App\Services\Paginate\Paginate;
use App\Services\Transformers\PasserTransformer;

class PasserController extends ApiController
{
    public function __construct(PasserTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function index(PasserFilter $filter)
    {
        $passers = new Paginate(Passer::filter($filter));

        return $this->respondWithPagination($passers);
    }
}
