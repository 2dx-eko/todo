<?php 
class LoginValidation{
    public $errors;

    public function check($user_id,$user_pass){
     if(empty($user_id) == true || empty($user_pass) == true){
        return false;
     }
       return true;
    }

    public function getErrorMessages(){
      echo "id、passが入力されていません入力してください<br>";
    }
    
}
?>