<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Course};
class CourseController extends CRUDController
{
    use APIResponseTrait;
    public function __construct(Course $model)
    {
        $this->model = $model;
    }
}
