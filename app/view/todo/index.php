<?php 

require_once("../../controller/TodoController.php");

//MVC「V」画面表示

//staticなので::で呼び出し
$controler = new TodoController;
$todo_list = $controler->index();
//$todo_list = Todo::findByQuery('SELECT * FROM todos');


if($_POST["submit"]){
    $title = $_POST["title"];
    $title_array = [];

    for($i=0; $i < count($todo_list); $i++){
        array_push($title_array,$todo_list[$i]["title"]);
        //var_dump($title_array);
    }
    
    if(in_array($title,$title_array)){
        echo $title;    
    }else{
        echo "あかんですわ！";
    }
}

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
    <form method="POST" action="">
        <input type="text" name="title">
        <input type="submit" name="submit">
    </form>
</body>
</html>
