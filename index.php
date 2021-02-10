<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

require __DIR__ . '/vendor/autoload.php';

define("APP_PATH", $_SERVER["DOCUMENT_ROOT"]);

use App\Application;

$application = new Application();
$application->run();
