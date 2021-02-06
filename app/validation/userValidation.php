<?php 
class userValidation{
    public $errors;

    public function check($user_name,$user_age){
      if(empty($user_name) == true || empty($user_age) == true){
        return false;
      }else{
        return true;
      }
    }

    public function idCheck($id){
      if(empty($id) || !is_numeric($id)){
        return false;
      }else{
        return true;
      }
    }

    public function passCheck($pass,$comfirm_pass){
      if(!$pass == $comfirm_pass){
        return false;
      }else if(empty($pass) || empty($comfirm_pass)){
        return false;
      }else{
        return true;
      }
    }

    public function getErrorMessages(){
      echo "名前、年齢が入力されていません入力してください<br>";
      return false;
    }
    public function getIdErrorMessages(){
      echo "IDが入力されていない、もしくは数字を入力してください<br>";
      return false;
    }
    public function getPassErrorMessages(){
      echo "PASS項目とPASS確認項目が一致していません正しく入力してください<br>";
      return false;
    }
    
}
?>