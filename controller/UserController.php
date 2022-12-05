<?php


namespace controller;
use models\UserModel;
use helpers\Response;

class UserController {


    public static function get(){
        $userModel = new UserModel;
        Response::send($userModel->getAllAccounts());
    }

    public static function login($username, $password){
        $userModel = new UserModel;
        $result = $userModel->checkLogin($username);
        
        if(password_verify($password, $result["password"])){
            Response::sendMessage('Success');
        } else {
            Response::sendMessage('Error');
        }      
    }

    
    public static function register($firstname, $lastname, $address, $mobileno, $email, $password, $username){
        $password = password_hash($password, PASSWORD_DEFAULT);

        $userModel = new UserModel;
        $result = $userModel->insertAccounts(
            $firstname,
            $lastname,
            $address,
            $mobileno,
            $email,
            $password,
            $username
        );
        Response::sendMessage($result);
    }
}

?>