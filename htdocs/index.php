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

$app->add(new \Slim\Extras\Middleware\CsrfGuard());
$app->post('/post/commit','\Tinitter\Controller\Post:commit');
$app->post('/login/commit','\Tinitter\Controller\Login:commit');
$app->get('/page/:page_num','\Tinitter\Controller\TimeLine:show');
$app->get('/home','\Tinitter\Controller\TimeLine:show');
$app->get('/login','\Tinitter\Controller\Login:login');
\Tinitter\Route::registration($app);

$app->run();


