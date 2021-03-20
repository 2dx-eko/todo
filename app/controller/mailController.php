<?php 
require_once("../../config/db.php");
require_once("../../model/users.php");
require_once("../../validation/mailValidation.php");
//MVC「C」処理の流れを制御する処理
class mailController{
    public function userResister(){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $mail = $_POST["mail"];
        $validation = new mailValidation();
        $mail_check = $validation->check($mail); //入力チェック
        if(!$mail_check){
            $_SESSION["mail_check"] = $validation->getErrorMessages();
            return false;
        }
        
        mb_language("Japanese"); 
        mb_internal_encoding("UTF-8");
        
        $email = $mail;
        $subject = "会員登録ありがとうございます"; // 題名 
        $body = "本文本文本文本文本文本文本文本文本文\n"; // 本文
        $to = $mail;
        $header = "From: $email\nReply-To: $email\n";
        
        mb_send_mail($to, $subject, $body, $header);
    }

}
?>
