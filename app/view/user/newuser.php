<?php
require_once("../../config/db.php");
require_once("../../model/users.php");
require_once("../../controller/UserController.php");


$user = new userController;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $update = $user->createUser();
    return;
}
if(isset($_SESSION["user_error"])){
    $error = $_SESSION["user_error"];
    unset($_SESSION["user_error"]);
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー新規登録</title>
</head>
<body>
    <h1>ユーザー新規登録</h1>
    <form method="post">
        名前：<input type="text" name="name"><br><br>
        年齢：<input type="text" name="age"><br><br>

        <button type="submit" name="user_submit">登録</button>
    </form>
</body>
</html>
<style>
input[type="text"] {
    width: 200px;
    padding: 10px 0;
}
button {
    width: 250px;
    padding: 10px 0px;
}
</style>