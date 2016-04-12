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
        //$error_list = V_Post::byArray($params);

        //if(empty($error_list)){
        //    $post = new M_Post;
        //    $post->nickname = $params['nickname'];
        //    $post->body = $params['body'];
        //    $post->save();

            $app->redirect('/home');
        //}else{
        //    $app->render(
        //        'Post/form.twig',
        //        [
        //            'params' => $params,
        //            'error_list' => $error_list
        //        ]
        //    );
        //}
    }
}
