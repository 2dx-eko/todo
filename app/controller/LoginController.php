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
        $validation->check($user_id,$user_pass); //入力チェック
        
        $user_search = User::userSearch($user_id,$user_pass); //searchメソッドで検索
        var_dump($user_search);
        if(!$user_search){
            echo "ログイン情報が間違えています";
            return false;
        }

        $_SESSION["user_id"] = $user_search["login_id"];
        $_SESSION["user_pass"] = $user_search["password"];
        header("Location: ../todo/index.php");
        

        /*$get_title = $_POST["title"];
        $get_detail = $_POST["detail"];
        
        $todo->setTitle($title);
        $todo->setDetail($detail);
 
        $query = sprintf("SELECT * FROM todos where users_id = %s",$users_id);
        if($todo->update($id,$get_title,$get_detail)){
            header("Location: ./index.php");
        }*/
    }


    
}
?>
