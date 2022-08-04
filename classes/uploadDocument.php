<?php

    class UploadDocument {
        public static function Upload($project_id,$task_id,$name){
            $path = UPLOADS_PATH."/documents/$project_id/$task_id";
            if(!is_dir($path)){
                mkdir($path,0777,true);
            }
            chmod($path,0770);
    
            foreach($_FILES[$name]['tmp_name'] as $i=>$tmp_name){
                if(preg_match('#/|\.\.|\.(bin|exe|sh|php|bat|cmd|py)$#i',$_FILES[$name]['name'][$i])){
                    exit;
                }
                move_uploaded_file($tmp_name,"$path/".$_FILES[$name]['name'][$i]);
            }
        }
    }
