<?php

class User extends Model{
    public static function getCurrentUser(){
        if(!empty($_SESSION['id'])){
            $user = User::Get($_SESSION['id']);
            if($user){
                return $user;
            }
        }
    }
}
