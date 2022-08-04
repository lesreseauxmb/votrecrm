<?php
session_start();
spl_autoload_register(function($className){
    $className = str_replace("\\","/",$className);
    if(strpos($className,"Controller") !== FALSE){
        $path = CONTROLLERS_PATH.'/'.$className.'.php';
        if(is_file($path)){
            include $path;
            return;
        }
    }
    
    foreach([
        CLASSES_PATH."/$className.php",
        MODELS_PATH."/$className.php",
        LIBS_PATH."/$className.php",
        MBPHP_PATH."/$className.php",
    ] as $path){
        if(is_file($path)){
            include $path;
            return;
        }
    }
});

$dbConfig = @include(CONFIG_PATH.'/db.php');
if($dbConfig) Model::Connect($dbConfig['username'],$dbConfig['password'],$dbConfig['dbName'],$dbConfig['host']);

// AJAX
if (!defined('AJAX')) define('AJAX',((!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')));

$ROUTER = new Router($_SERVER['REQUEST_URI'],@include(CONFIG_PATH.'/routes.php'));
function VIEW(array $vars = []){
    global $ROUTER;
    
    if($ROUTER->isValid()){
        $ROUTER->outputView($vars);
    } elseif(is_file(DOCUMENT_ROOT.'/404.php')) {
        include(DOCUMENT_ROOT.'/404.php');
    } else {
        http_response_code(404);
    }
}
