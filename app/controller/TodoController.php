<?php 
require_once("../../model/todo.php");
//MVC「C」処理の流れを制御する処理
class TodoController{
    //findAllからDB情報取得
    public function index(){
       $todo_list = Todo::findAll();
       return $todo_list;
    }
}
?>