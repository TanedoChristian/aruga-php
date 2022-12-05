<?php
namespace Aruga\Platform\router;

use Aruga\Platform\helpers\ValidateApi;

class Router {

    public static function get($newUri, $callback) {       
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $uri = $_SERVER['REQUEST_URI'];
                $uri = explode('/', $uri);
                unset($uri[0]);
                unset($uri[1]);

                $uri = implode($uri);
                $newUri = str_replace(array(
                    "/"
                ) , "", $newUri);

                switch ($uri) {
                    case $newUri:
                        call_user_func($callback);
                    break;
                    default:
                    break;
                }
            }
        

    }

    public static function getByID($newUri, $callback) {
      
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $uri = $_SERVER['REQUEST_URI'];
                $uri = explode('/', $uri);
                unset($uri[0]);
                unset($uri[1]);
                $stringUri = '/' . implode($uri) . '/id';
                $toCompare = str_replace(array(
                    "{",
                    "}"
                ) , "", $newUri);
                $toCompare = explode('/', $toCompare);
                unset($toCompare[0]);
                if (count($toCompare) == count($uri)) {
                    call_user_func_array($callback, array(
                        $uri[3]
                    ));
                }
            }
        
    }

    public static function post($newUri, $callback) {
      
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $data = file_get_contents('php://input');
                $data = json_decode($data, true);

                $uri = $_SERVER['REQUEST_URI'];
                $uri = explode('/', $uri);
                unset($uri[0]);
                unset($uri[1]);
                $uri = '/' . implode($uri);
                switch ($uri) {
                    case $newUri:
                        call_user_func_array($callback, array(
                            $data
                        ));
                    break;
                    default:
                    break;
                }
            }
        
    }

    public static function patch($newUri, $callback) {
       
            if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
                $uri = $_SERVER['REQUEST_URI'];
                $uri = explode('/', $uri);
                unset($uri[0]);
                unset($uri[1]);
                $uri = '/' . implode($uri);
                switch ($uri) {
                    case $newUri:
                        call_user_func($callback);
                    break;
                    default:
                    break;
                }
            }
        
    }

    public static function delete($newUri, $callback) {
      

    

        
            if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                $uri = $_SERVER['REQUEST_URI'];
                $uri = explode('/', $uri);
                unset($uri[0]);
                unset($uri[1]);
                $uri = '/' . implode($uri);
                switch ($uri) {
                    case $newUri:
                        call_user_func($callback);
                    break;
                    default:
                    break;
                }
            }
        
    }
    
    public static function deleteByID($newUri, $callback) {
            if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                $uri = $_SERVER['REQUEST_URI'];
                $uri = explode('/', $uri);
                unset($uri[0]);
                unset($uri[1]);
                $stringUri = '/' . implode($uri) . '/id';
                $toCompare = str_replace(array(
                    "{",
                    "}"
                ) , "", $newUri);
                $toCompare = explode('/', $toCompare);
                unset($toCompare[0]);
                if (count($toCompare) == count($uri)) {
                    call_user_func_array($callback, array(
                        $uri[3]
                    ));
                }
            }
        }
}

?>
