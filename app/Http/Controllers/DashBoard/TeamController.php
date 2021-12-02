<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Team};

class TeamController extends CRUDController
{
    use APIResponseTrait;
    public function __construct(Team $model)
    {
        $this->model = $model;
    }
}
