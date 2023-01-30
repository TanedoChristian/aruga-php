<?php

use Aruga\Platform\router\Router;
use controller\UserController;


require 'vendor/autoload.php';
require 'vendor/aruga/platform/myautoloader.php';

myAutoloder();



Router::get('/accounts', function(){
    header('Content-type: application/json');
    UserController::get();
});


Router::post('/register', function($request){
    UserController::register(
        $request["firstname"],
        $request["lastname"],
        $request["address"],
        $request["telno"],
        $request["mobileno"],
        $request["email"],
        $request["password"],
        $request["username"],
        $request["type"],
        $request["status"]
    );
});



Router::post('/login', function($request){
    UserController::login(
        $request["username"],
        $request["password"]   
    );
});

Router::delete('/delete-user', function(){
    UserController::deleteAllUser();
});








?>