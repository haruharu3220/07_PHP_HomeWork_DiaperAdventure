<?php
$question = $_POST['question1'];
$choices1 = $_POST['choices1_1'];
$choices2 = $_POST['choices1_2'];
$choices3 = $_POST['choices1_3'];
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

$sql0 = 'SELECT MAX(questionNo) FROM Question';
$stmt0 = $pdo->prepare($sql0);

try {
  $status0 = $stmt0->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$questionNumber = $stmt0->fetch(PDO::FETCH_ASSOC);
$answer = (int)substr($answer_contact1 , -1);
// $questionNumber++;
// var_dump($questionNumber);
// var_dump($questionNumber["MAX(questionNo)"]);
$questionNumber["MAX(questionNo)"]++;
// var_dump($questionNumber["MAX(questionNo)"]);

$test =3;
//SQL 作成&実行
$sql = 'INSERT INTO Question (qID, questionNo, qContent)VALUES (NULL, :questionNo, :question);
        INSERT INTO Choices (choicesID, questionNO, choicesNo, choicesContent)VALUES (NULL, :questionNo, 1,:choices1);
        INSERT INTO Choices (choicesID, questionNO, choicesNo, choicesContent)VALUES (NULL, :questionNo, 2,:choices2);
        INSERT INTO Choices (choicesID, questionNO, choicesNo, choicesContent)VALUES (NULL, :questionNo, 3,:choices3);
        INSERT INTO Correct (cID, qNO, cNo)VALUES (NULL, :questionNo, :answer);';



$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':question', $question, PDO::PARAM_STR);
$stmt->bindValue(':choices1', $choices1, PDO::PARAM_STR);
$stmt->bindValue(':choices2', $choices2, PDO::PARAM_STR);
$stmt->bindValue(':choices3', $choices3, PDO::PARAM_STR);
$stmt->bindValue(':answer', $answer, PDO::PARAM_STR);
$stmt->bindValue(':questionNo', $questionNumber["MAX(questionNo)"], PDO::PARAM_STR);

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
    <title>DiaperAdventure</title>
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
</head>
<body>
<h1>確認画面</h1>
<p>以下の問題を登録しました。</p>
<p>問題文：<?=$question ?></p>
<p>選択肢１<?=$choices1 ?></p>
<p>選択肢２<?=$choices2 ?></p>
<p>選択肢３<?=$choices3 ?></p>
<p>正解は<?=$answer ?>です。</p>

<a class="btn btn-custom01 returnTop">
  <span class="btn-custom01-front">トップに戻る</span>
  <i class="fas fa-angle-right fa-position-right"></i>
</a>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/verification.js"></script>
</body>
</html>