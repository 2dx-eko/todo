<?php 
require_once("../../model/todo.php");

//staticなので::で呼び出し
$todo_list = Todo::findByQuery('SELECT * FROM todos');
/*$pdo = new PDO(DSN, USERNAME, PASSWORD);
$stmh = $pdo->query('SELECT * FROM todos');

$todo_list = $stmh->fetchAll(PDO::FETCH_ASSOC);
*/
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
