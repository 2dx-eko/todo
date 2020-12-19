<?php 
class userValidation{
    public $errors;

    public function check($user_name,$user_age){
     if(empty($user_name) == true || empty($user_age) == true){
        return false;
     }
       return true;
    }

    public function getErrorMessages(){
      echo "名前、年齢が入力されていません入力してください<br>";
      return false;
    }
    
}
?>