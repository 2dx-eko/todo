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

    //ログインしてからユーザー情報編集メソッド
    public function userEdit(){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);

        $user_id = $_REQUEST["id"];
        $user_pass = $_REQUEST["pass"];
        $edit_name = $_POST["edit_name"]; //編集画面から編集された値を取得
        $edit_age = $_POST["edit_age"]; //編集画面から編集された値を取得

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
