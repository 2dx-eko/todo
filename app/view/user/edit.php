<?php
require_once("../../config/db.php");
require_once("../../model/todo.php");
require_once("./../../controller/UserController.php");

$id = (int)$_GET["id"];
$pass = (int)$_GET["pass"];
$pdo = new PDO(DSN, USERNAME, PASSWORD);
$stmh = $pdo->query(
    "SELECT * FROM users WHERE id = '$id' AND password = '$pass'"
);
$user = $stmh->fetch(PDO::FETCH_ASSOC);//ページ遷移時inputのvalueに編集前の情報が入るようにするため情報取得

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $controller = new UserController();
    $controller->edit();
}


if(isset($_SESSION["edit_errorname"]) || isset($_SESSION["edit_errorage"])){
    $error_messages[] = $_SESSION["edit_errorname"];
    $error_messages[] = $_SESSION["edit_errorage"];
    unset($_SESSION["edit_errorname"]);
    unset($_SESSION["edit_errorage"]);
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
    <ul>
    <?php foreach($error_messages as $error_message): ?>
        <li><?php echo $error_message ?></li>
    <?php endforeach; ?>
    </ul>
    <form method="post">
        <div>
            <div>名前</div>
            <div>
                <?php if(!isset($_SESSION["edit_username"])): ?>
                <input name="edit_name" type="text" value="<?php echo $user["name"]; ?>">
                <?php else: ?>
                <input name="edit_name" type="text" value="<?php echo $_SESSION["edit_username"]; ?>"></input>
                <?php endif; ?>
            </div>
        </div>
        <div>
            <div>年齢</div>
        <div>
            <?php if(!isset($_SESSION["edit_userage"])): ?>
            <input name="edit_age" type="text" value="<?php echo $user["age"]; ?>"></input>
            <?php else: ?>
            <input name="edit_age" type="text" value="<?php echo $_SESSION["edit_userage"]; ?>"></input>
            <?php endif; ?>
        </div>
        </div>
        <br>
        <button type="submit">ユーザー情報を更新</button>
    </form>
</body>
</html>