<?php 
require_once("../../model/todo.php");
require_once("../../validation/TodoValidation.php");
//MVC「C」処理の流れを制御する処理


class TodoController{
    //findAllからDB情報取得
    public function index(){
        $title = $_GET["title"];
        $status = $_GET["status"];
        $status = (int) $status;
        
        $params = [];
        if($title) {
            $params = array_merge($params,array("title" => $title));
        }
        if($status) {
            $params = array_merge($params,array("status" => $status));
        }
        //$query = $this->getQuery($title,$status);
        $query = $this->getQuery($params);

        $todo_list = Todo::findByQuery($query);//一部取得

        return $todo_list;

    }

    //↑$title $statusを受け取ってDBから検索するメソッド
    public function getQuery($params){
        $where = "WHERE ";
        $and = " AND ";
        foreach($params as $key => $value){
            if(!empty($value)){
                $where = $where . sprintf("%s = '%s'", $key, $value);
            }
            //↓ループが最後以外の時にandがたされる！！！！！
            if($value !== end($params)){
                $where = $where . $and;
            }
        }
        $query = sprintf("SELECT * FROM todos %s", $where);
        return $query;
        //$query = "SELECT * FROM todos WHERE title = '" . $title . "'" . "AND status =" . $status;       
    }

    //詳細画面用のメソッド
    public function detail(){
        $todo = $_GET["todo_id"];
        $todo_list = Todo::findById($todo);
        if(!$todo_list){ //検索がない場合はfalseで返ってくる
            header("Location: ../errors/404.php");
            return false;
        }
        return $todo_list;
    }

    public function new(){
        $data = [
            "title" =>  $_POST["title"],
            "detail" =>  $_POST["detail"],
        ];
        
        $validation = new TodoValidation;
        $validation->setData($data);
        if($validation->check() === false) {
            $error_msgs = $validation->getErrorMessages();

            session_start();
            $_SESSION["error_msgs"] = $error_msgs;

            $params = sprintf("?title=%s&detail=%s", $title, $detail);
            header("Location: ./new.php" . $params);
        }
    
        $validate_data = $validation->getData();
        $title = $validate_data["title"];
        $detail = $validate_data["detail"];

        $todo = new Todo;
        $todo->setTitle($title);
        $todo->setDetail($detail);
        $result = $todo->save();
        if(!$result){
            $params = sprintf("?title=%s&detail=%s", $title, $detail);
            header("Location: ./new.php" . $params);
        }
        header("Location: ./index.php");
    }
}
      /*$error_msgs = [];
       if(empty($title)){
            $error_msgs[] = "タイトルが空です!";
       }
       if(empty($detail)){
            $error_msgs[] = "詳細が空です!";
       }
       if(count($error_msgs) > 0) {
            $params = sprintf("?title=%s&detail=%s", $title, $detail);
            header("Location: ./new.php" . $params);
       }*/
?>
