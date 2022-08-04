<?php

class Router{

    public $view;
    public $vars;
    public $prefix;

    public function __construct($requestUrl,$routes){
        if(is_array($routes)){
            foreach($routes as $url => $view){
                $vars = [];
                $regex = preg_replace_callback("/#[a-z]+\w*/i", function($matches)use(&$vars,$url){
                    foreach($matches as $match){
                        $vars[] = $match;
                    }
                    return '([\w-]+)';
                },$url);
                $prefix = NULL;
                $regex = preg_replace_callback("#^((\w+):)?#", function($matches)use(&$prefix){
                    if(!empty($matches[2])){
                        $prefix = $matches[2];
                    }
                    return "";
                },$regex);
                if(preg_match("#^$regex/?(\?.+)?$#",$requestUrl,$matches)){
                    foreach($vars as $i => $var){
                        $this->vars[substr($var,1)] = $matches[$i+1];
                    }
                    $this->view = $view;
                    $this->prefix = $prefix;
                    return;
                }
            }
        }
        if(preg_match("#^((/[\w-]+)*)/?(\?.*)?$#",$requestUrl,$matches)){
            $fileName = $matches[1];
            if($fileName === "" && DEFAULT_INDEX_VIEW){
                $fileName = DEFAULT_INDEX_VIEW;
            }
            $filePath = VIEWS_PATH.'/'.$fileName.'.php';
            if(is_file($filePath)){
                $this->view = $fileName;
            }
        }
    }

    public function outputView(array $vars = []){
        if(is_array($this->vars)){
            foreach($this->vars as $var => $value){
                $$var = $value;
            }
        }
        foreach($vars as $var => $value){
            $$var = $value;
        }
        $filePath = VIEWS_PATH.'/'.$this->view.'.php';
        include $filePath;
    }

    public function isValid(){
        return $this->view != "";
    }
}
