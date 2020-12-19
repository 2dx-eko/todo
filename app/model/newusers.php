<?php
require_once("../../config/db.php");

//MVC「M」DBから値を取得したり、保存したりする処理を記述

class User{
    public $user_name;
    public $user_age;

    public static function userEntry($user_name,$user_age){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);

        $set_id = $pdo->query(
        "SELECT * FROM users ORDER BY id DESC LIMIT 1"
        );
        $get_id = $set_id->fetch(PDO::FETCH_ASSOC);
        $last_id = $get_id["id"];//usersテーブルに登録されている一番最後のIDを取得
        $new_id = $last_id++; //新しく登録するuserのid

        $stmh = $pdo->prepare(
            "INSERT INTO users (`id`,`name`,`age`) VALUES ('$new_id`,`$user_name`,`$user_age')"
        );
       
        /*
        $stmh = $pdo->query(
            "SELECT * FROM users WHERE id = '$user_name' AND password = '$user_age'"
        );*/
        
        var_dump($stmh);
       $stmh->fetch(PDO::FETCH_ASSOC);
        return true;
    }


    /*
    //入力したidを元にカラムを取得（連想配列）
    public static function findById($user_id){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query("SELECT * FROM users WHERE login_id = {$user_id}");
        $user = $stmh->fetch(PDO::FETCH_ASSOC);
        return $user;
    } */

}
?>