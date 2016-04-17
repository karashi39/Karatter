<?php
namespace Tinitter\Model;
class Post extends \Illuminate\Database\Eloquent\Model{
    static function getByPage($per_page, $page_num){
        $offset = $per_page*($page_num-1);
        $post_list = static::where("deleted",0)->orderBy('id','DESC')->take($per_page+1)->skip($offset)->get()->all();

        if(count($post_list)>$per_page){
            array_pop($post_list);
            $next_page_is_exist = true;
        }else{
            $next_page_is_exist = false;
        }

        return [$post_list, $next_page_is_exist];
    }
}
