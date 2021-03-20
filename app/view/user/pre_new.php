<?php
require_once("../../config/db.php");
require_once("../../controller/mailController.php");
$action = new mailController;
if(isset($_POST["mail_submit"])){
    $action->userResister();
    echo $_SESSION["mail_check"][0];
    unset($_SESSION["mail_check"][0]);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録画面</title>
</head>
<body>
    <h1>会員登録画面</h1>
    <form action="" method="post">
       <p>mailaddress：<input type="text" name="mail" size="50" value="<?php echo $_POST["mail"] ?>"></p> 
<input type="submit" name="mail_submit" value="送信">
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