<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Team};

class DepartmentController extends CRUDController
{
     use APIResponseTrait;
    public function __construct(Team $model)
    {
        $this->model = $model;
    }
}
