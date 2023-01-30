<?php


namespace controller;

use Aruga\Platform\helpers\ValidateApi;
use models\UserModel;
use helpers\Response;

class UserController {


    public static function get(){
        
        if(!ValidateApi::check()){
            Response::sendMessage('No api key found');
            return;
        }

        $userModel = new UserModel;
        Response::send($userModel->getAllAccounts());
    }

    public static function login($username, $password){

        if(!ValidateApi::check()){
            Response::sendMessage('No api key found');
            return;
        }

        $userModel = new UserModel;
        $result = $userModel->checkLogin($username);
        
        if(password_verify($password, $result["password"])){
            Response::sendMessage('Success');
        } else {
            Response::sendMessage('Error');
        }      
    }

    
    public static function register($firstname, $lastname, $address, $telno, $mobileno, $email, $password, $username, $type, $status){

        if(!ValidateApi::check()){
            Response::sendMessage('No api key found');
            return;
        }   

        $password = password_hash($password, PASSWORD_DEFAULT);
        $id = uniqid('user');
        $userModel = new UserModel;
        $result = $userModel->insertAccounts(
            $id,
            $firstname,
            $lastname,
            $address,
            $telno,
            $mobileno,
            $email,
            $password,
            $username,
            $type,
            $status
        );
        Response::sendMessage($result);
    }

    public static function deleteAllUser(){
        if(!ValidateApi::check()){
            Response::sendMessage('No api key found');
            return;
        }  

        $userModel = new UserModel;
        $result = $userModel->deleteAll();

        Response::sendMessage($result);
    }
}

?>