<?php
require_once("../../config/db.php");

//MVC「M」DBから値を取得したり、保存したりする処理を記述

class User{
    public $user_id;
    public $user_pass;
    
    /*public function getUsersId(){
        return $this->users_id;
    }
    public function setUsersId($id){
        $this->users_id = $id;
    }

    public function getUsersPass(){
        return $this->users_pass;
    }
    public function setUsersPass($pass){
        $this->users_pass = $pass;
    }
    */

    public function userSearch($user_id,$user_pass){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query(
            "SELECT * FROM users WHERE login_id = {$user_id} AND password = {$user_pass}"
        );
        $user = $stmh->fetch(PDO::FETCH_ASSOC);
        return $user;
    }



    //入力したidを元にカラムを取得（連想配列）
    public static function findById($user_id){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query("SELECT * FROM users WHERE login_id = {$user_id}");
        $user = $stmh->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

}
?>