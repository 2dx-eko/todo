<?php
require_once("../../config/db.php");

//MVC「M」DBから値を取得したり、保存したりする処理を記述

class users{
    public $users_id;
    public $users_pass;

    public function getUsers_id(){
        return $this->users_id;
    }
    public function setUsers_id($id){
        $this->users_id = $id;
    }

    public function getUsers_pass(){
        return $this->users_pass;
    }
    public function setUsers_pass($pass){
        $this->users_pass = $pass;
    }

    //入力したidを元にカラムを取得（連想配列）
    public static function findById($users_id){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query("SELECT * FROM users where login_id = ${users_id}");
        $users = $stmh->fetch(PDO::FETCH_ASSOC);
        return $users;
    }

}
?>