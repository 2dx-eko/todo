<?php 
class mailValidation{
    private $errors;

    public function check($mail){
      if(empty($mail)){
        $this->errors[] = "値が空です入力してください";
        return false;
      }
      if(!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD',$mail)){
        $this->errors[] = "アドレスの形式が正しくありません";
        return false;
      }
      return true;
    }

    public function getErrorMessages(){
      return $this->errors;
    }


}
?>