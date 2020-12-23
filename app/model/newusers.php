<?php
require_once("../../config/db.php");

//MVC「M」DBから値を取得したり、保存したりする処理を記述

class User{
    public $user_name;
    public $user_age;

    public static function userEntry($user_name,$user_age){
        $user_age = (int)$user_age;
        
        $pdo = new PDO(DSN, USERNAME, PASSWORD);

        $set_id = $pdo->query("SELECT * FROM users ORDER BY id DESC LIMIT 1");

       /* "INSERT INTO `todos`
        (`id`, `user_id`,`title`,`detail`,`status`,`created_at`,`updated_at`)
        VALUES (0,0,'%s','%s',1,NOW(),NOW())",
 */
        // "SELECT * FROM users WHERE id = '$user_id' AND password = '$user_pass'"
        $stmh = $pdo->prepare(
            "INSERT INTO users
            ('id','name','age','created_at','updated_at')
            VALUES (3,'$user_name','$user_age',NOW(),NOW())");
        //INSERT INTO users (id,name,age,created_at,updated_at) VALUES (2,"test",11,NOW(),NOW());DBから直書きだとこれでOK
         
        var_dump($stmh);
       $stmh->fetch(PDO::FETCH_ASSOC);
        return true;
    }
}
?>