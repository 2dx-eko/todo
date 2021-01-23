<?php 
session_start();
$user_id = $_SESSION["user_id"];
$user_pass = $_SESSION["user_pass"];
require_once("../../controller/TodoController.php");

//MVC「V」画面表示

//staticなので::で呼び出し
$controler = new TodoController;
$todo_list = $controler->index();
echo "<pre>";

echo "</pre>";


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>TODOリスト</title>
</head>
<body>


    <header>
        <a href="userEdit.php?id=<?php echo $user_id; ?>&pass=<?php echo $user_pass; ?>">
        ユーザー情報編集画面
        </a>
        <br><br>
        <a href="./new.php">
        新規作成
        </a>
    </header>
    <div>
        <ul>
        <?php foreach($todo_list as $todo): ?>
            <li>
                <a href="./detail.php?todo_id=<?php echo $todo["id"] ?>">
                    <?php echo $todo["title"]; ?>
                </a>
            </li>
        </ul>
        <?php endforeach; ?>
    </div>
    <br><br>
    <ul>
        <?php foreach($todo_list as $todo): ?>
            <li>
                <a href="./detail.php?todo_id=<?php echo $todo["id"]; ?>">
                    <?php echo $todo["title"]; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="GET" action="index.php">
        <input type="radio" name="status" value="1">完了
        <input type="radio" name="status" value="2">未完了
        <br>
        <input type="text" name="title">
        <input type="submit" name="submit">
        
        
    </form>
</body>
</html>
