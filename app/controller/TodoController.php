<?php 
require_once("../../model/todo.php");
//MVC「C」処理の流れを制御する処理


class TodoController{
    //findAllからDB情報取得
    public function index(){
        $title = $_GET["title"];
        $status = $_GET["status"];
        if(isset($title)){
            //todos内のtitleを取得
            $query = "SELECT * FROM todos WHERE title =" . $title;
        }
        if(isset($status)){
            //todos内のstatusを取得
            $query = "SELECT * FROM todos WHERE status =" . $status;
        }
        //$todo_list = Todo::findAll();
        $todo_list = Todo::findByQuery($query);
        return $todo_list;

    }
}
?>