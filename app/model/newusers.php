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

       /* "INSERT INTO `todos`
        (`id`, `user_id`,`title`,`detail`,`status`,`created_at`,`updated_at`)
        VALUES (0,0,'%s','%s',1,NOW(),NOW())",
 */
        // "SELECT * FROM users WHERE id = '$user_id' AND password = '$user_pass'"
        
        try{
            $stmh = $pdo->prepare("INSERT INTO items(\name\,\age\) VALUES ('$user_name','$user_age')");
        }catch(Exception $e){
            echo "error";
        }

        //INSERT INTO items (name,age) VALUES ("test",1111);DBから直書きだとこれでOK
            
        var_dump($stmh);
       $stmh->fetch(PDO::FETCH_ASSOC);
        return true;
    }
}
?>