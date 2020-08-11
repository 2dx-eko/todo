<?php
require_once("./../../controller/TodoController.php");
require_once('./../../config/db.php');
require_once('./../../model/todo.php');

$controler = new TodoController;
$todo = $controler->detail();

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>詳細画面</h1>
    <table class="table">
    <thead>
    <tr>
        <td>タイトル</td>
        <td>詳細</td>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row"><?php echo $todo["title"]; ?></td>
            <td><?php echo $todo["detail"]; ?></td>
        </tr>
    </tbody>
    </table>
    <br>
    <div>
        <button>
            <a href="./edit.php?todo_id=<?php echo $todo["id"]; ?>">編集</a>
            
        </button>
    </div>
</body>
</html>


<style>
table.table {
    border-left: solid 1px #111;
    border-top: solid 1px #111;
}

table.table td {
    border-right: solid 1px #111;
    border-bottom: solid 1px #111;
}
td {
    padding: 10px;
}

table {
    border-spacing: 0;
}
</style>