<?php 
class TodoValidation{
    private $data;
    private $error_msgs = [];

    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }

    public function getErrorMessages(){
         return $this->error_msgs;
    }

    public function check(){
        $title = $this->data["title"];
        $detail = $this->data["detail"];

       if(empty($title)){
            $error_msgs[] = "タイトルが空です!";
       }
       if(empty($detail)){
            $error_msgs[] = "詳細が空です!";
       }
       if(count($this->error_msgs) > 0) {
            return false;
       }
       return true;
    }
}
?>