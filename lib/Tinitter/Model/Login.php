<?php
namespace Tinitter\Model;
class Login extends \Illuminate\Database\Eloquent\Model{

    static function getLogin(){
        $admin_login = static::where('id',1)->first();
        return $admin_login;
    }
}
