<?php
namespace Tinitter;
class Route{
    static function registration($app){
        if($app->getCookie('login')){
            $app->get('/login/ok', function(){echo "login";});
        }else{
             $app->get('/login/ok', function(){echo "logout";});
        }
        $app->get('/','\Tinitter\Controller\TimeLine:show');
        $app->post('/post/commit','\Tinitter\Controller\Post:commit');
        $app->post('/login/commit','\Tinitter\Controller\Login:commit');
        $app->get('/page/:page_num','\Tinitter\Controller\TimeLine:show');
        $app->get('/home','\Tinitter\Controller\TimeLine:show');
        $app->get('/login','\Tinitter\Controller\Login:login');
    }
}
