<?php

namespace Aruga\Platform\helpers;

class ValidateApi {


    public static function check(){

        $headers = apache_request_headers();
        if(isset($headers['Authorization'])){
            $api = $headers["Authorization"];
        } else {
            $api = '';
        }
        if($api == $_SERVER['HTTP_API_KEY']){
            return true;
        } else{
            return false;
        }

    }
}








?>