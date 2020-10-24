<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
</head>
<body>
    <div class="login_title">ログインページ</div>
    <div class="login_col">
        <form action="result.php" method="post">
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

