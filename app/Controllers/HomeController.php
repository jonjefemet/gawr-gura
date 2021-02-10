<?php

namespace App\Controllers;

use App\GuraTools\BaseController;

class HomeController extends BaseController
{

    public function __construct()
    {
        $this->template = "Home/index";
    }

    public function index()
    {
        $this->render(["array" => [], "pana" => "ok"]);
    }
}
