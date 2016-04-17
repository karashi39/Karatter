<?php
namespace Tinitter\Controller;
use \Tinitter\Model\Post as M_Post;
use \Tinitter\Validator\Post as V_Post;
class Post{
    public function commit (){
        $app = \Slim\Slim::getInstance();
        $params = $app->request->params();
        $error_list = V_Post::byArray($params);

        if(empty($error_list)){
            $post = new M_Post;
            $post->nickname = $params['nickname'];
            $post->body = $params['body'];
            $post->deleted = '0';
            $post->save();

            $app->redirect('/home');
        }else{
            $app->render(
                'Post/form.twig',
                [
                    'params' => $params,
                    'error_list' => $error_list
                ]
            );
        }
    }

    public function deletePost (){
        $app = \Slim\Slim::getInstance();
        $params = $app->request->params();
        //$params = [ 'id'=>5 ];

        $post = new M_Post;
        $post->where('id', $params['id'])->update(['deleted' => 1]);

        $app->redirect('/home'); 
    }
}
