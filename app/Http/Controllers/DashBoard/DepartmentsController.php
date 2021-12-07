<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Department};
class DepartmentsController extends CRUDController
{
    use APIResponseTrait;
    public function __construct(Department $model)
    {
        $this->model = $model;
    }
}
