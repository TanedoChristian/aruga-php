<?php

namespace helpers;
class Response {

    public static function sendMessage($data){
        $message = [
            'message' => $data
        ];
        echo json_encode($message);
    }

    public static function send($data){
        echo json_encode($data);
    }
}













?>