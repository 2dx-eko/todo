<?php 
require_once("../../config/db.php");
require_once("../../model/users.php");
//MVC「C」処理の流れを制御する処理


class LoginController{
    public function login(){
        $user_id = $_POST["user_id"];
        $user_pass = $_POST["password"];
        if(empty($user_id) == true || empty($user_pass) == true){
            echo "id、passが入力されていません入力してください";
            return false;
        }
        $user = new User();
        
        $user_search = $user->userSearch($user_id,$user_pass); //searchメソッドで検索
        $search_id = $user_search["id"];
        
        $user_list = $user::findByid($search_id);
        
        $get_id = $user_list["login_id"];
        $get_pass = $user_list["password"];
        
        if($user_id == $get_id && $user_pass == $get_pass){
            $_SESSION["user_id"] = $get_id;
            $_SESSION["get_pass"] = $get_pass;
            header("Location: ../todo/index.php");
            
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
