<?php

use Aruga\Platform\router\Router;
use controller\UserController;


require 'vendor/autoload.php';
require 'vendor/aruga/platform/myautoloader.php';

myAutoloder();



Router::get('/accounts', function(){
    UserController::get();
});


Router::post('/register', function($request){
    UserController::register(
        $request["firstname"],
        $request["lastname"],
        $request["address"],
        $request["mobileno"],
        $request["email"],
        $request["password"],
        $request["username"]
    );
});



Router::post('/login', function($request){
    UserController::login(
        $request["username"],
        $request["password"]   
    );
});








?>