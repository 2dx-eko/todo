<?php 
class UserValidation{
    private $errors;

    public function check($check){
      if(empty($check["user_name"]) == true || empty($check["user_age"]) == true){
        $this->errors[] = "名前、年齢が入力されていません入力してください";
        return false;
      }
      
      if(empty($check["id"]) || !is_numeric($check["id"])){
        $this->errors[] = "IDが入力されていない、もしくは数字を入力してください";
        return false;
      }
      
      if(!$check["pass"] == $check["comfirm_pass"]){
        $this->errors[] = "PASS項目とPASS確認項目が一致していません正しく入力してくださいx";
        return false;
      }
      
      if(empty($check["pass"]) || empty($check["comfirm_pass"])){
        $this->errors[] = "PASS項目とPASS確認項目が一致していません正しく入力してください";
        return false;
      }
      return true;
    }

    public function getErrorMessages(){
      return $this->errors;
    }
    //--------↑ユーザー新規登録----↓ユーザー情報編集--
    public function checkEdit($edit_name,$edit_age){
      $name = $this->checkName($edit_name);
      $age = $this->checkAge($edit_age);
      if(!$name || !$age){
        return false;
      }
      return true;
    }
    
    public function checkName($edit_name){
      if(empty($edit_name)){
        $_SESSION["edit_username"] = $edit_name;
        $this->errors[] = "名前が入力されていません";
        return false;
      }else{
        $_SESSION["edit_username"] = $edit_name;
        return true;
      }
    }
     
    public function checkAge($edit_age){
      if(empty($edit_age)){
        $_SESSION["edit_userage"] = $edit_age;
        $this->errors[] = "年齢が入力されていません";
        return false;
      }else if(!is_numeric($edit_age)){
        $_SESSION["edit_userage"] = $edit_age;
        $this->errors[] = "年齢は数字を入力してください";
      }else{
        $_SESSION["edit_userage"] = $edit_age;
        return true;
      }

    }

}
?>