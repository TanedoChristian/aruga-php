<?php



function myAutoloder() {
    spl_autoload_register(function ($name) {
        $path = str_replace("\\", "/", $name);
        include $path . '.php';
    });
    
}



?>