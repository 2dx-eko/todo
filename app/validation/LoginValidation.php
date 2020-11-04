<?php 
class LoginValidation{

    public function check($user_id,$user_pass){
     if(empty($user_id) == true || empty($user_pass) == true){
          echo "id、passが入力されていません入力してください";
          return false;
     }
       return true;
    }
}
?>