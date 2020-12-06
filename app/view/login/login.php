<?php
require_once('./../../config/db.php');
require_once('./../../model/users.php');
require_once("./../../controller/LoginController.php");

session_start();

//unset($_SESSION["login_error"]);
$action = new LoginController;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $update = $action->login();
    return;
}//!$update
if(isset($_SESSION["login_error"])){
    $error = $_SESSION["login_error"];
    unset($_SESSION["login_error"]);
}

//echo $_SESSION["login_error"];

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
</head>
<body>

    <p><?php echo $error;?></p>

    <div class="login_title">ログインページ</div>
    <div class="login_col">
        <form method="post">
                <div>
                    ID: <input name="user_id" type="text" value="<?php echo $_POST["user_id"]; ?>">
                    PASS: <input name="password" type="text" value="<?php echo $_POST["password"]; ?>">
                </div>
                <div>
                    <input name="id" type="hidden" value="<?php echo $todo["id"]; ?>">
                </div>
            <div class="submit">
                <button type="submit" name="login">ログイン</button>
            </div>
        </form>
    </div>
</body>
</html>






<style>
.login_title {
    text-align: center;
    margin-bottom: 1rem;
}
.submit {
    text-align: center;
    margin: 30px 0 0 0;
}

.submit > button {width: 12rem;padding: 1rem 0;}
.login_col {
    width: 460px;
    margin: auto;
}
</style>

