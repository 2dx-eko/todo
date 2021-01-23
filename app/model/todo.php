<?php
require_once("../../config/db.php");

//MVC「M」DBから値を取得したり、保存したりする処理を記述

class Todo{
    public $title;
    public $detail;
    public $status;

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getDetail(){
        return $this->detail;
    }

    public function setDetail($detail){
        $this->detail = $detail;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }


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

    public static function findById($todo_id){
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query(sprintf("SELECT * FROM todos where id = %s",$todo_id));

        $todo = $stmh->fetch(PDO::FETCH_ASSOC);
        
        return $todo;
    }

    //保存用メソッド
    public function save(){
        $query = sprintf(
            "INSERT INTO `todos`
            (`id`, `user_id`,`title`,`detail`,`status`,`created_at`,`updated_at`)
            VALUES (0,0,'%s','%s',1,NOW(),NOW())",
            $this->title,
            $this->detail
        );
        try{
            $pdo = new PDO(DSN, USERNAME, PASSWORD);

            //ここからトランザクション
            $pdo->beginTransaction();

            $result = $pdo->query($query);
             
            $pdo->commit();

        }catch(PDOException $e){
            $pdo->rollBack();
            echo $e->getMessage();
        }
    }


    public function update($id,$get_title,$get_detail){//idとれてる
        
        $format = "UPDATE `todos` SET `title` = '%s', `detail` = '%s' WHERE id =  %s"; //フォーマット
        $query = sprintf($format, $get_title,$get_detail,$id);//sdfに入る値
        //$query = sprintf($format, $this->title,$this->detail,$id);//sdfに入る値
        //$query = 'UPDATE todos SET title = "aaaaaaaa", detail = "aaaaaaaaaaaaaaaaa" WHERE id =  54;';
        //
        try{
            $pdo = new PDO(DSN, USERNAME, PASSWORD);
            //トランザクション
            $pdo->beginTransaction();

            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $pdo->commit();
        }catch(PDOException $e){
            $pdo->rollBack();

            echo $e->getMessage();
        }

    }
}
?>