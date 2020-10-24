<?php 
require_once("../../config/db.php");
require_once("../../model/users.php");
//MVC「C」処理の流れを制御する処理


class LoginController{
    public function login(){
        $users_id = (int)$_POST["user_id"];
        $users_pass = (int)$_POST["password"];

        $users = new users($users_id);

        $users_list = $users::findByid($users_id);

        $get_id = (int)$users_list["login_id"];
        $get_pass = (int)$users_list["password"];
        
        if($users_id === $get_id && $users_pass === $get_pass){
            echo "true!!!";
        }else{
            echo "ログイン情報が間違えています";
        }

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
