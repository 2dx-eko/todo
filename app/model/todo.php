<?php
require_once("../../config/db.php");

class Todo{
    //DBを呼び出す用メソッド
    public static function findByQuery($query){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query('SELECT * FROM todos');

        $todo_list = $stmh->fetchAll(PDO::FETCH_ASSOC);
        
        return $todo_list;
    }
}

?>