<?php
require_once('./../../config/db.php');
require_once('./../../model/users.php');
require_once("./../../controller/LoginController.php");

session_start();

$action = new LoginController;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $update = $action->login();
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
</head>
<body>
    <div class="login_title">ログイン結果ログイン結果</div>

</body>
</html>


