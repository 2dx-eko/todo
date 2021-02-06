<?php 
class editValidation{
    public $errors;

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