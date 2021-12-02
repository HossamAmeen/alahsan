<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Complaint};

class ComplaintController extends CRUDController
{
     use APIResponseTrait;
    public function __construct(Complaint $model)
    {
        $this->model = $model;
    }
}
