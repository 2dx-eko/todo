<?php
require_once("../../config/db.php");
require_once("../../model/users.php");
require_once("../../controller/UserController.php");

//メールに添付されたURLのパラメータ、トークン取得
$token = $_GET["token"];
$token_check = User::tokenCheck($token);

if(!$token_check){
    header("Location:/404");
}

$user = new UserController;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $update = $user->new($token);
    if(isset($_SESSION["user_check"])){
        echo $_SESSION["user_check"][0];
    }
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
        ID ：<input type="text" name="id"><br><br>
        PASS ：<input type="text" name="pass"><br><br>
        PASS（確認用） ：<input type="text" name="comfirm_pass"><br><br>
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