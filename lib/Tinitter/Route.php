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
        if($app->getCookie('login')){
            $app->get('/login/ok', function(){echo "login";});
            $app->post('/post/delete','\Tinitter\Controller\Post:deletePost');
        }else{
            $app->get('/login/ok', function(){echo "logout";});
        }
        $app->add(new \Slim\Extras\Middleware\CsrfGuard());
    }
}
