<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Article};

class ArticleController extends CRUDController
{
     use APIResponseTrait;
    public function __construct(Article $model)
    {
        $this->model = $model;
    }
}
