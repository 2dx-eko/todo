<?php 
require_once("../../config/db.php");
require_once("../../model/users.php");
require_once("../../validation/userValidation.php");
//MVC「C」処理の流れを制御する処理
class userController{
    public function new(){
        $user_name = $_POST["name"];
        $user_age = $_POST["age"];
        
        $validation = new userValidation();
        $user_check =  $validation->check($user_name,$user_age); //入力チェック
        
        //name,ageどっちかが空だったら
        if(!$user_check){
            $validation->getErrorMessages();
            return false;
        }
        //id,pass,両方入力があった際に新規登録処理開始
        $user_new = User::userEntry($user_name,$user_age); //searchメソッドで検索

        header("Location: ../login/login.php");
    }
}
?>
