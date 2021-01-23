<?php
require_once("../../config/db.php");
require_once("../../model/todo.php");
require_once("./../../controller/TodoController.php");

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $controller = new TodoController();
    $controller->userEdit();
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー情報編集</title>
</head>
<body>
    <h1>ユーザー情報編集</h1>
    <form method="post">
        <div>
            <div>名前</div>
            <div>
                <input name="edit_name" type="text">
            </div>
        </div>
        <div>
            <div>年齢</div>
        <div>
            <textarea name="edit_age"></textarea>
        </div>
        </div>
        <br>
        <button type="submit">ユーザー情報を更新</button>
    </form>
</body>
</html>