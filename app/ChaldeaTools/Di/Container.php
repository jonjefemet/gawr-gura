<?php

namespace App\ChaldeaTools\Di;

use Throwable;

class Container
{
    public static function newController($controller)
    {
        try {
            $obj_controller = "\App\\Controllers\\" . $controller;
            return new $obj_controller;
        } catch (Throwable $th) {
            new Throwable($th->getMessage(), 1);
        }
    }
    public static function getModel($model)
    {
        $objModel = "\App\\Models\\" . $model;
        #return new $objModel(Database::getConection());
    }

    public static function pageNotFound()
    {
        if (file_exists("../app/Views/errors/404.php")) {
            return require_once "../app/Views/errors/404.php";
        } else {
            echo "Erro: Página não encontrada...";
        }
    }
}
