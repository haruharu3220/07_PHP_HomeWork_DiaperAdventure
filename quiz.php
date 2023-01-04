<?php
//DB接続
$dbn ='mysql:dbname=DiaperAdventure;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

//SQL 作成&実行
$sql_question = 'SELECT * FROM Question';
$stmt_question = $pdo->prepare($sql_question);


$sql_choices = 'SELECT * FROM Choices';
$stmt_choices = $pdo->prepare($sql_choices);


try {
  $status_question = $stmt_question->execute();
  $status_choices = $stmt_choices->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理
$result_question = $stmt_question->fetchAll(PDO::FETCH_ASSOC);
$result_choices = $stmt_choices->fetchAll(PDO::FETCH_ASSOC);

foreach ($result_question as $record) {
  $output .= "
    <tr>
      <td>{$record_question["deadline"]}</td>
      <td>{$record["todo"]}</td>
    </tr>
  ";
}






?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>