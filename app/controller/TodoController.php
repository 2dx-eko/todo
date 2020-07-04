<?php 
require_once("../../model/todo.php");
//MVC「C」処理の流れを制御する処理


class TodoController{
    //findAllからDB情報取得
    public function index(){
        $title = $_GET["title"];
        $status = $_GET["status"];
        if(isset($title,$status)){
            //todos内のtitleとstatusの条件に一致した物を取得
            $query = "SELECT * FROM todos WHERE title =" . $title ."AND status =" . $status;
            var_dump($query);
        }else{
            $error = "空です";
            var_dump($error);
            return $error;
        }

        //$todo_list = Todo::findAll();//全部取得
        $todo_list = Todo::findByQuery($query);//一部取得
        return $todo_list;

    }
}
?>