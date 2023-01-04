<?php
$question1 = $_POST['question1'];
$choices1_1 = $_POST['choices1_1'];
$choices1_2 = $_POST['choices1_2'];
// $choices1_3 = $_POST['choices1_3'];
$answer_contact1 = $_POST['answer_contact1'];

// echo '<pre>';
// var_dump($question1 );
// var_dump($choices1_1 );
// var_dump($choices1_2 );
// var_dump($answer_contact1 );
// echo '</pre>';
//exit();

// $question2 = $_POST['question2'];
// $choices2_1 = $_POST['choices2_1'];
// $choices2_2 = $_POST['choices2_2'];
// $choices2_3 = $_POST['choices2_3'];
// $answer_contact2 = $_POST['answer_contact2'];

// $question3 = $_POST['question3'];
// $choices3_1 = $_POST['choices3_1'];
// $choices3_2 = $_POST['choices3_2'];
// $choices3_3 = $_POST['choices3_3'];
// $answer_contact3 = $_POST['answer_contact3'];


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

$test =3;
$answer = (int)substr($answer_contact1, -1);
var_dump($answer);


//SQL 作成&実行
$sql = 'INSERT INTO Question (qID, questionNo, qContent)VALUES (NULL, :test, :question1);
        INSERT INTO Choices (choicesID, questionNO, choicesNo, choicesContent)VALUES (NULL, 1, 1,:choices1_1);
        INSERT INTO Choices (choicesID, questionNO, choicesNo, choicesContent)VALUES (NULL, 1, 2,:choices1_2);
        INSERT INTO Correct (cID, qNO, cNo)VALUES (NULL, 1, :answer);';



$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':test', $test, PDO::PARAM_STR);
$stmt->bindValue(':question1', $question1, PDO::PARAM_STR);
$stmt->bindValue(':choices1_1', $choices1_1, PDO::PARAM_STR);
$stmt->bindValue(':choices1_2', $choices1_2, PDO::PARAM_STR);
$stmt->bindValue(':answer', $answer, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

//SQL 実行後の処理
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $output = "";
// foreach ($result as $record) {
//   $output .= "
//     <tr>
//       <td>{$record["deadline"]}</td>
//       <td>{$record["todo"]}</td>
//     </tr>
//   ";
// }


// header('Location:settings.php');
// exit();

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
<!-- <p><?=$choices1_3 ?></p>
<p>問題２</p>
<p><?=$question2 ?></p>
<p><?=$choices2_1 ?></p>
<p><?=$choices2_2 ?></p>
<p><?=$choices2_3 ?></p>
<p>問題３</p>
<p><?=$question3 ?></p>
<p><?=$choices3_1 ?></p>
<p><?=$choices3_2 ?></p>
<p><?=$choices3_3 ?></p> -->

</body>
</html>