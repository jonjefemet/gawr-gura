<?php

namespace App\Controllers;

use App\ChaldeaTools\BaseController;

class HomeController extends BaseController
{

    public function __construct()
    {
        $this->template = "Home/index";
    }

    public function index()
    {
        $this->render("index",["array" => [], "pana" => ["ok","pana"]]);
    }
}
