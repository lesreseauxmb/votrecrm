<?php

    class uploadImage {
        public static function Upload($multiple,$type,$id,$name){
            $path = UPLOADS_PATH."/$type/$id";
            if(!is_dir($path)){
                mkdir($path,0777,true);
            }
            chmod($path,0777);
            
            if($multiple == 1){
                foreach($_FILES[$name]['tmp_name'] as $i=>$tmp_name){
                    if(preg_match('#/|\.\.|\.(bin|exe|sh|php|bat|cmd|py)$#i',$_FILES[$name]['name'][$i])){
                        exit;
                    }
                    move_uploaded_file($tmp_name,"$path/".$_FILES[$name]['name'][$i]);
                }
            } else {
                if(preg_match('#/|\.\.|\.(bin|exe|sh|php|bat|cmd|py)$#i',$_FILES[$name]['name'])){
                    exit;
                }
                move_uploaded_file($_FILES[$name]['tmp_name'],"$path/".$_FILES[$name]['name']);
                chmod($path/$_FILES[$name]['name'],0777);
            }
        }
    }
