<?php
namespace Tinitter\Controller;
class Login
{
    public function login ()
    {
        $app = \Slim\Slim::getInstance();
        $app->render(
            'Login/show.twig'
        );
    }

    public function commit (){
        $app = \Slim\Slim::getInstance();
        $params = $app->request->params();
        $error_list = \Tinitter\Validator\Login::byArray($params);

        if(empty($error_list)){
            $app->setCookie('login',1,time()+1200);
            $app->redirect('/home');
        }else{
            $app->deleteCookie('login');            
            $app->render(
                'Login/show.twig',
                [
                    'params' => $params,
                    'error_list' => $error_list
                ]
            );
        }
    }

    public function logout (){
        $app = \Slim\Slim::getInstance();
        $app->deleteCookie('login');            
        $app->redirect('/home');
    }
}
