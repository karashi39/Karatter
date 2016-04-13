<?php

namespace Tinitter\Validator;
class Login extends \Respect\Validation\Validator{
    static function byArray(array $params){
        $error_list = [];

        $login = \Tinitter\Model\Login::getLogin();

        if( !( $params['name'] === $login['name']) || (!password_verify($params['pass'], $login['pass']))){
            $error_list['error'] = 'ログインできません';
        }

        return $error_list;
    }
}

