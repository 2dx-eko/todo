<?php 
require_once("../../config/db.php");
require_once("../../model/users.php");
require_once("../../validation/mailValidation.php");
require_once("../../controller/UserController.php");
//MVC「C」処理の流れを制御する処理
class MailController{
    public function userResister(){
        $mail = $_POST["mail"];
        $validation = new mailValidation();
        $mail_check = $validation->check($mail); //入力チェック
        if(!$mail_check){
            $_SESSION["mail_check"] = $validation->getErrorMessages();
            return false;
        }
        
        //送信できたらDBにトークン、アドレス、仮登録状態にする
        try{
            $token = User::tokenIssue($mail);
        }catch(Exception $e){
            echo "DBエラー";
            return false;
        }
        mb_language("Japanese"); 
        mb_internal_encoding("UTF-8");
        
        $email = $mail;
        $subject = "会員登録ありがとうございます"; // 題名 
        $body = "登録はこちらから「http://localhost:8000/view/user/new.php?token={$token}」\n"; // 本文
        $to = $mail;
        $header = "From: test@example.com";
        $result = mb_send_mail($to, $subject, $body, $header);
        $result = mail('test@example.com', 'テストだよ', '届いてるかな？', 'From: from@example.com');
        var_dump($result);//trueなら送信OK
        

    }

}
?>
