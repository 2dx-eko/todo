<?php 
require_once("../../model/todo.php");
//MVC「C」処理の流れを制御する処理


class TodoController{
    //findAllからDB情報取得
    public function index(){
        $title = $_GET["title"];
        $status = $_GET["status"];
        $status = (int) $status;
       
        if(isset($title) && (!isset($status))){
            $query = "SELECT * FROM todos WHERE title =" . $title;
            

        }else if((empty($title)) && isset($status)){
            $query = "SELECT * FROM todos WHERE title =" . $status;

        }else if(!isset($title,$status)){    
            $todo_list = Todo::findAll();//全部取得

        }
        
        var_dump($query);
        $todo_list = Todo::findByQuery($query);//一部取得

        return $todo_list;

    }
}
?>