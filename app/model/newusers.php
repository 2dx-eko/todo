<?php
require_once("../../config/db.php");

//MVC「M」DBから値を取得したり、保存したりする処理を記述

class User{
    public $user_name;
    public $user_age;

    public static function userEntry($user_name,$user_age){
        $user_age = (int)$user_age;
        
        $pdo = new PDO(DSN, USERNAME, PASSWORD);

        $set_id = $pdo->query("SELECT * FROM items ORDER BY id DESC LIMIT 1");
        
        try{
            $stmh = $pdo->prepare("INSERT INTO users
            (\name\,\age\,\created_at\,\updated_at\)
            VALUES ('$user_name','$user_age',NOW(),NOW())");
        }catch(Exception $e){
            echo "error";
        }
        
        
        //INSERT INTO users (name,age,created_at,updated_at,login_id,password) VALUES ("test",2222,NOW(),NOW(),1010,1100);DBから直書きだとこれでOK
            
        var_dump($stmh);
       $stmh->fetch(PDO::FETCH_ASSOC);
        return true;
    }
}
?>