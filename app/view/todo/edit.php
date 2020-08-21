<?php
require_once('./../../config/db.php');
require_once('./../../model/todo.php');
require_once("./../../controller/TodoController.php");

session_start();

$action = new TodoController;
$todo = $action->edit(); //編集画面表示用
$update = $action->update($todo); //登録ボタン処理用

$error_msgs = $_SESSION["error_msgs"];

unset($_SESSION["error_msgs"]);

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集</title>
</head>
<body>
    <div>編集</div>
    <form action="./edit.php" method="post">
        <div>
            <div>
                <input name="title" type="text" value="<?php echo $todo["title"]; ?>">
            </div>
        </div>
        <div>
            <div>詳細</div>
            <div>
                <textarea name="detail">
                    <?php echo $todo["detail"]; ?>
                </textarea>
            </div>
        </div>
        <button type="submit">登録</button>    
    </form>
    <?php if($error_msgs): ?>
        <div>
            <ul>
                <?php foreach($error_msgs as $error_msg): ?>
                    <li><?php echo $error_msg; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</body>
</html>


