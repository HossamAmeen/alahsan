<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Department};

class DepartmentController extends CRUDController
{
     use APIResponseTrait;
    public function __construct(Department $model)
    {
        $this->model = $model;
    }
}
