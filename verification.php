<?php
$question1 = $_POST['question1'];
$choices1_1 = $_POST['choices1_1'];
$choices1_2 = $_POST['choices1_2'];
$choices1_3 = $_POST['choices1_3'];
$answer_contact1 = $_POST['answer_contact1'];

$question2 = $_POST['question2'];
$choices2_1 = $_POST['choices2_1'];
$choices2_2 = $_POST['choices2_2'];
$choices2_3 = $_POST['choices2_3'];
$answer_contact2 = $_POST['answer_contact2'];

$question3 = $_POST['question3'];
$choices3_1 = $_POST['choices3_1'];
$choices3_2 = $_POST['choices3_2'];
$choices3_3 = $_POST['choices3_3'];
$answer_contact3 = $_POST['answer_contact3'];


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




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>確認画面</h1>
<p>以下の問題を登録しました。</p>
<p>問題１</p>
<p><?=$question1 ?></p>
<p><?=$choices1_1 ?></p>
<p><?=$choices1_2 ?></p>
<p><?=$choices1_3 ?></p>
<p>問題２</p>
<p><?=$question2 ?></p>
<p><?=$choices2_1 ?></p>
<p><?=$choices2_2 ?></p>
<p><?=$choices2_3 ?></p>
<p>問題３</p>
<p><?=$question3 ?></p>
<p><?=$choices3_1 ?></p>
<p><?=$choices3_2 ?></p>
<p><?=$choices3_3 ?></p>

</body>
</html>