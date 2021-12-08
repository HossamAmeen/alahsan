<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
class AdminsController extends CRUDController
{
    use APIResponseTrait;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
