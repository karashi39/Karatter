<?php
namespace Tinitter;
class Route{
    static function registration($app){
        $app->get('/','\Tinitter\Controller\TimeLine:show');
        $app->post('/post/commit','\Tinitter\Controller\Post:commit');
        $app->post('/login/commit','\Tinitter\Controller\Login:commit');
        $app->get('/logout','\Tinitter\Controller\Login:logout');
        $app->get('/page/:page_num','\Tinitter\Controller\TimeLine:show');
        $app->get('/home','\Tinitter\Controller\TimeLine:show');
        $app->get('/login','\Tinitter\Controller\Login:login');
        $app->add(new \Slim\Extras\Middleware\CsrfGuard());
    }
}
