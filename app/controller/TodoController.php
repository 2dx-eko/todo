<?php 
require_once("../../model/todo.php");
//MVC「C」処理の流れを制御する処理


class TodoController{
    //findAllからDB情報取得
    public function index(){
        $title = $_GET["title"];
        $status = $_GET["status"];
        $status = (int) $status;
        
        $query = $this->getQuery($title,$status);

        var_dump($query);
        $todo_list = Todo::findByQuery($query);//一部取得

        return $todo_list;

    }

    //↑$title $statusを受け取ってDBから検索するメソッド
    public function getQuery($title,$status){
        if(isset($title) && $status == 0){//タイトルのみが入ってるとき

            $query = "SELECT * FROM todos WHERE title = '" . $title . "'";

        }else if(empty($title) && $status == 1 || 2){//ステータスのみが入ってるとき

            $query = "SELECT * FROM todos WHERE status =" . $status;

        }else if(isset($title) && $status == 1 || 2){//両方が入ってる時   

            $query = "SELECT * FROM todos WHERE title = '" . $title . "'" . "AND status =" . $status;
        }
        return $query;
    }
}
?>