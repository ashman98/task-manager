<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFunctions;
use App\Interfaces\IBaseRepository;
use App\Services\BaseService;

abstract class Controller
{
    use ResponseFunctions;

    protected BaseService $service;
    protected IBaseRepository $repository;
}
