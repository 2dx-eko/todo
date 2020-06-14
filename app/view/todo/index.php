<?php 
$dsn = 'mysql:host=1cb63a885cfd;dbname=common;charset=utf8';
$user = 'eko';
$password = 'eko';

$pdo = new PDO($dsn, $user, $password);
$stmh = $pdo->query('SELECT * FROM todos');

$todo_list = $stmh->fetchAll(PDO::FETCH_ASSOC);
//var_dump($todo_list);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>TODOリスト</title>
</head>
<body>
    <ul>
        <?php foreach($todo_list as $todo): ?>
        <li>
        <?php echo $todo["title"]; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
