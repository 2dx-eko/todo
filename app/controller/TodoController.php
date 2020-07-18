<?php 
require_once("../../model/todo.php");
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
        var_dump($query);

        return $query;
        //$query = "SELECT * FROM todos WHERE title = '" . $title . "'" . "AND status =" . $status;       
    }
}
?>