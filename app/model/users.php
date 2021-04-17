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
    public static function userEntry($user_name,$user_age,$id,$pass,$token){
        $user_age = (int)$user_age;
        $id = (int)$id;
        $pass = (int)$pass;
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        try{
            $sql ="UPDATE users SET name = '$user_name', age = '$user_age' , created_at = NOW() , updated_at = NOW() , login_id = '$id' , password = '$pass' , status = 2 WHERE token = '$token'";
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
       
       if(!isset($id)){
           return false;
       }else if($id == $user["id"]){
           return $user;
        }
    }

    //ユーザー登録処理のSQL処理
    public static function getByUserIdAndPassword($pdo,$user_id,$user_pass){
        $stmh = $pdo->query(
            "SELECT * FROM users WHERE id = '$user_id' AND password = '$user_pass'"
        );
        $userinfo = $stmh->fetch(PDO::FETCH_ASSOC); //idとpassを元にユーザー情報を検索
        return $userinfo;
    }

    //ユーザー登録処理のSQL処理
    public static function updateUser($pdo,$edit_name,$edit_age,$id){
        $sql = "UPDATE users SET name = '$edit_name' , age = '$edit_age' WHERE id = '$id'";
        $stmh_edit = $pdo->prepare($sql);
        $result = $stmh_edit->execute();
    }

    //メールからnew.php遷移時パラメータのトークンとDB内にあるユーザー情報内に同じトークンがあるか
    public static function tokenCheck($token){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query(
            "SELECT * FROM users WHERE token = '$token'"
        );
        $usertoken = $stmh->fetch(PDO::FETCH_ASSOC); //idとpassを元にユーザー情報を検索
        return $usertoken;
    }
    
    //DBにトークン、アドレス、仮登録状態にする
    public static function tokenIssue($mail){
        $token = uniqid(dechex(random_int(0, 255)));
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $sql = "INSERT INTO `users` (`name`,`age`,`created_at`,`updated_at`,`login_id`,`password`,`email`,`status`,`token`) VALUES (default,default,default,default,default,default,'$mail',0,'$token')";
        $stmh_edit = $pdo->prepare($sql);
        $result = $stmh_edit->execute();
        return $token;
    }

}

?>