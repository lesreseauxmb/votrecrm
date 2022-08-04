<?php

class Model {

    public static $db;
    public static $primary_key = 'id';
    protected $data;
    protected $modified_data;

    public static function Connect($username,$password,$dbName,$host='localhost'){
        static::$db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
    }

    public function __construct(array $data){
        $this->data = $data;
    }

    public static function getTableName(){
        return strtolower(get_called_class());
    }

    public function Save(){
        if(!empty($this->data[static::$primary_key])){
            if(!empty($this->modified_data)){
                $keys = array_keys($this->modified_data);
                $values = array_values($this->modified_data);
                $values []= $this->data[static::$primary_key];
    
                $prepareValues = [];
                foreach($keys as $key){
                    $prepareValues[] ="`$key` = ?";
                }
    
                $req = static::$db->prepare('UPDATE `'.static::getTableName().'` SET '.implode(',',$prepareValues).' WHERE `'.static::$primary_key.'` = ?');
                $req->execute($values);
                $this->modified_data = NULL;
            }
        } else {
            $keys = "`".implode("`,`",array_keys($this->data))."`";
            $values = array_values($this->data);

            $prepareValues = [];
            foreach($values as $value){
                $prepareValues []="?";
            }

            $req = static::$db->prepare('INSERT INTO `'.static::getTableName().'`('.$keys.') VALUES('.implode(',',$prepareValues).')');
            $req->execute($values);
            $this->data[static::$primary_key] = static::$db->lastInsertId();
        } 
        return $this;
    }

    public static function Get($id){
        $req = static::$db->prepare('SELECT * FROM `'.static::getTableName().'` WHERE `'.static::$primary_key.'` = ?');
        $req->execute([$id]);
        $className = get_called_class();
        if($result = $req->fetch(PDO::FETCH_ASSOC))
            return new $className($result);
    }

    public static function GetBy($field,$value){
        $req = static::$db->prepare('SELECT * FROM `'.static::getTableName().'` WHERE `'.$field.'` = ?');
        $req->execute([$value]);
        $className = get_called_class();
        if($result = $req->fetch(PDO::FETCH_ASSOC))
            return new $className($result);
    }

    public static function Delete($id){
        $req = static::$db->prepare('DELETE FROM `'.static::getTableName().'` WHERE `'.static::$primary_key.'` = ?');
        $req->execute([$id]);
    }

    public static function FetchAll($statement="",$values=[]){
        $req = static::$db->prepare('SELECT * FROM `'.static::getTableName().'` '.$statement);
        $req->execute($values);
        $className = get_called_class();
        $rows = [];
        while($row = $req->fetch(PDO::FETCH_ASSOC)){
            $rows [$row[static::$primary_key]]= new $className($row);
        }
        return $rows;
    }

    public static function FetchSingle($statement="",$values=[]){
        $req = static::$db->prepare('SELECT * FROM `'.static::getTableName().'` '.$statement);
        $req->execute($values);
        $className = get_called_class();
        if($result = $req->fetch(PDO::FETCH_ASSOC))
            return new $className($result);
    }

    public static function Query($statement,$values=[]){
        $req = static::$db->prepare($statement);
        $req->execute($values);
        $className = get_called_class();

        $rows = [];
        while($row = $req->fetch(PDO::FETCH_ASSOC)){
            $rows [$row[static::$primary_key]]= new $className($row);
        }
        return $rows;
    }

    public static function QuerySingle($statement,$values=[]){
        $req = static::$db->prepare($statement);
        $req->execute($values);
        $className = get_called_class();
        if($result = $req->fetch(PDO::FETCH_ASSOC))
            return new $className($result);
    }

    public function __get($var){
        return $this->data[$var];
    }

    public function __set($var,$value){
        $this->data[$var] = $value;
        $this->modified_data[$var] = $value;
    }
}
