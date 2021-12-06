<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Event};
class EventController extends CRUDController
{
    use APIResponseTrait;
    public function __construct(Event $model)
    {
        $this->model = $model;
    }
}
