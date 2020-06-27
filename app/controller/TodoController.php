<?php 
require_once("../../model/todo.php");
//MVC「C」処理の流れを制御する処理


class TodoController{
    //findAllからDB情報取得
    public function index(){
        $title = $_GET["title"];
        $name = $_GET["complete"];
        

        //$todo_list = Todo::findAll();
        $todo_list = Todo::findByQuery();
        return $todo_list;

    }
}
?>