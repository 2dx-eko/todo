<?php
require_once("../../config/db.php");

//MVC「M」DBから値を取得したり、保存したりする処理を記述

class Todo{
    //DBを呼び出す用メソッド
    public static function findByQuery($query){
        
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        //$stmh = $pdo->query('SELECT * FROM todos');
        $stmh = $pdo->query($query);
        if($stmh){
            $todo_list = $stmh->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $todo_list = array();
        }
        
        return $todo_list;
    }

    //全部を返すメソッド
    public static function findAll(){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query('SELECT * FROM todos');

        $todo_list = $stmh->fetchAll(PDO::FETCH_ASSOC);
        
        return $todo_list;
    }

    public static function findById($todo){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query(sprintf("SELECT * FROM todos where id = %s",$todo));

        $todo = $stmh->fetch(PDO::FETCH_ASSOC);
        
        return $todo;
    }
}
?>