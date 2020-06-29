<?php 

require_once("../../controller/TodoController.php");

//MVC「V」画面表示

//staticなので::で呼び出し
$controler = new TodoController;
$todo_list = $controler->index();
var_dump($todo_list);
//$todo_list = Todo::findByQuery('SELECT * FROM todos');


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>TODOリスト</title>
</head>
<body>
    <ul>
        <?php foreach($todo_list as $todo): ?>
        <li>
        <?php echo $todo["title"]; ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <form method="GET" action="">
        <input type="radio" name="status" value="完了">完了
        <input type="radio" name="status" value="未完了" checked>未完了
        <br>
        <input type="text" name="title">
        <input type="submit" name="submit">
        
        
    </form>
</body>
</html>
