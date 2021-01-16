<?php
require_once("../../config/db.php");

//MVC「M」DBから値を取得したり、保存したりする処理を記述

class User{
    public $user_id;
    public $user_pass;

    public $user_name;
    public $user_age;

    //
    public static function userSearch($user_id,$user_pass){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query(
            "SELECT * FROM users WHERE id = '$user_id' AND password = '$user_pass'"
        );
        $user = $stmh->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    //ユーザー登録処理
    public static function userEntry($user_name,$user_age){
        $user_age = (int)$user_age;
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        
        try{
            $sql = "INSERT INTO `users` (`name`,`age`,`created_at`,`updated_at`,`login_id`,`password`) VALUES ('$user_name','$user_age',NOW(),NOW(),10,10)";
            $stmh = $pdo->prepare($sql);
            $result = $stmh->execute();
        }catch(Exception $e){
            echo "error";
        }
        
        

       $id = (int)$pdo->lastInsertId();//登録した新規のIDを返す 
       $select = $pdo->query(
           "SELECT * FROM users WHERE id='$id'"
        );
       $user = $select->fetch(PDO::FETCH_ASSOC);
       return $user;
    }


}
?>