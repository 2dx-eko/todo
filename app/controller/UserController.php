<?php 
require_once("../../config/db.php");
require_once("../../model/users.php");
require_once("../../validation/UserValidation.php");

//MVC「C」処理の流れを制御する処理
class UserController{
    public function new($token){
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
        if(!$user_check){
            $_SESSION["user_check"] = $validation->getErrorMessages();
            return false;
        }
        //id,pass,両方入力があった際に新規登録処理開始
        $user_new = User::userEntry($user_name,$user_age,$id,$pass,$token); //searchメソッドで検索
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
        $checkEdit = $validation->checkEdit($edit_name,$edit_age);
        if(!$checkEdit){
            $error = $validation->getErrorMessages();
            $_SESSION["edit_errorname"] = $error[0];
            $_SESSION["edit_errorage"] = $error[1];
            return false;
        }
        //user情報取得
        $userinfo = User::getByUserIdAndPassword($pdo,$user_id,$user_pass);
        $id = (int)$userinfo["id"];
        //user情報を元にupdateで更新
        try{
            User::updateUser($pdo,$edit_name,$edit_age,$id);
            header("Location:../todo/index.php");
        }catch(Exception $e){
            echo "データベースエラー";
        }
    }

    //会員登録成功時に仮登録を行う
    public static function tokenRegister($email){
        $token = uniqid(dechex(random_int(0, 255)));
        User::tokenTemporary($email,$token);
        return $token;
        
    }



}
?>
