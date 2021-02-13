<?php 
class UserValidation{
    public $errors;

    public function check($check){
      if(empty($check["user_name"]) == true || empty($check["user_age"]) == true){
        $message = "名前、年齢が入力されていません入力してください<br>";
        return $message;
      }else if(empty($check["id"]) || !is_numeric($check["id"])){
        $message = "IDが入力されていない、もしくは数字を入力してください<br>";
        return $message;
      }else if(!$check["pass"] == $check["comfirm_pass"]){
        $message = "PASS項目とPASS確認項目が一致していません正しく入力してください<br>";
        return $message;
      }else if(empty($check["pass"]) || empty($check["comfirm_pass"])){
        $message = "PASS項目とPASS確認項目が一致していません正しく入力してください<br>";
        return $message;
      }
    }
 
    //--------↑ユーザー新規登録----↓ユーザー情報編集--
    public function check_name($user_name){
      if(empty($user_name)){
        $_SESSION["edit_username"] = $user_name;
        echo "名前が入力されていません<br>";
        return false;
      }else{
        $_SESSION["edit_username"] = $user_name;
        return true;
      }
    }
     
    public function check_age($user_age){
      if(empty($user_age)){
        $_SESSION["edit_userage"] = $user_age;
        echo "年齢が入力されていません";
        return false;
      }else if(!is_numeric($user_age)){
        $_SESSION["edit_userage"] = $user_age;
        echo "年齢は数字を入力してください";
      }else{
        $_SESSION["edit_userage"] = $user_age;
        return true;
      }

    }

}
?>