<?php 
require_once("../../config/db.php");
require_once("../../model/users.php");
require_once("../../validation/UserValidation.php");
//MVC「C」処理の流れを制御する処理
class UserController{
    public function new(){
        $user_name = $_POST["name"];
        $user_age = $_POST["age"];
        $id = $_POST["id"];
        $pass = $_POST["pass"];
        $comfirm_pass = $_POST["comfirm_pass"]; 
        $check = [
            "user_name" => $user_name,
            "user_age" => $user_age,
            "id" => $id,
            "pass" => $pass,
            "comfirm_pass" => $comfirm_pass
        ];

        $validation = new UserValidation();
        $user_check = $validation->check($check); //入力チェック
        //name,ageどっちかが空だったら
        if(isset($user_check)){
            $_SESSION["user_check"] = $user_check;
            return false;
        }
        //id,pass,両方入力があった際に新規登録処理開始
        $user_new = User::userEntry($user_name,$user_age,$id,$pass); //searchメソッドで検索
        unset($_SESSION["user_check"]);
        header("Location: ../login/login.php");
    }

    //ログインしてからユーザー情報編集メソッド
    public function edit(){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);

        $user_id = $_REQUEST["id"];
        $user_pass = $_REQUEST["pass"];
        $edit_name = $_POST["edit_name"]; //編集画面から編集された値を取得
        $edit_age = $_POST["edit_age"]; //編集画面から編集された値を取得
        
        $validation = new UserValidation();
        $check_name =  $validation->check_name($edit_name); //入力チェック
        $check_age =  $validation->check_age($edit_age); //入力チェック
        if(!$check_name || !$check_age){
            return false;
        }
        $stmh = $pdo->query(
            "SELECT * FROM users WHERE id = '$user_id' AND password = '$user_pass'"
        );
        $userinfo = $stmh->fetch(PDO::FETCH_ASSOC); //idとpassを元にユーザー情報を検索
        if(!$userinfo){
            header("Location:../todo/index.php");     
        }
        $id = (int)$userinfo["id"];

        try{ //UPDATE文で更新
            $sql = "UPDATE users SET name = '$edit_name' , age = '$edit_age' WHERE id = '$id'";
            $stmh_edit = $pdo->prepare($sql);
            $result = $stmh_edit->execute();
            
            header("Location:../todo/index.php");
        }catch(Exception $e){
            echo "データベースエラー";
        }
    }

}
?>
