<?php 
require_once("../../config/db.php");
require_once("../../model/users.php");
require_once("../../validation/LoginValidation.php");
//MVC「C」処理の流れを制御する処理
class LoginController{
    public function login(){
        $user_id = $_POST["user_id"];
        $user_pass = $_POST["password"];
        $validation = new LoginValidation();
        $login_check =  $validation->check($user_id,$user_pass); //入力チェック
        
        //id,passどっちかが空だったら
        if(!$login_check){
            $validation->getErrorMessages();
            return false;
        }

        //id,pass,両方入力があった際に検索開始
        $user_search = User::userSearch($user_id,$user_pass); //searchメソッドで検索
        if(!$user_search){
            session_start();
            $_SESSION["login_error"] = "ログイン情報が間違えています";
            header("Location: login.php");
            return;
        }

        $_SESSION["user_id"] = $user_search["login_id"];
        $_SESSION["user_pass"] = $user_search["password"];
        header("Location: ../todo/index.php");
    }
}
?>
