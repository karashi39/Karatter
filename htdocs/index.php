<?php
session_start();

ini_set("display_errors", "1"); // debug
error_reporting(-1);

require '../vendor/autoload.php';
require '../config.php';

\Base\DB::registerIlluminate($db_settings);


$app = new \Slim\Slim([
    'templates.path' => TEMPLATES_DIR_PATH,
    'view' => new \Slim\Views\Twig()
]);

\Tinitter\Route::registration($app);

$app->run();


