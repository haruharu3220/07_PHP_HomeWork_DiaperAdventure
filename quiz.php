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

$sql_correct = 'SELECT * FROM Correct';
$stmt_correct = $pdo->prepare($sql_correct);


try {
  $status_question = $stmt_question->execute();
  $status_choices = $stmt_choices->execute();
  $status_correct = $stmt_correct->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// SQL実行の処理
$result_question = $stmt_question->fetchAll(PDO::FETCH_ASSOC);
$result_choices = $stmt_choices->fetchAll(PDO::FETCH_ASSOC);
$result_correct = $stmt_correct->fetchAll(PDO::FETCH_ASSOC);


// echo '<pre>';
// var_dump($result_question);
// var_dump($result_choices);
// var_dump($result_correct);
// echo '</pre>';


// foreach ($result_question as $record) {
//   $output .= "
//     <tr>
//       <td>{$record_question["deadline"]}</td>
//       <td>{$record["todo"]}</td>
//     </tr>
//   ";
// }


//３つのDBから問題文、選択肢、正解を取得
$str='';
foreach($result_question as $question){
  $str .= "<p class=question>{$question['qContent']}</p>";
  foreach($result_choices as $choices){
    if($choices['questionNo']===$question['questionNo']){
      foreach($result_correct as $correct){
        if(((int)$choices['questionNo']===(int)$correct['qNo']) && ((int)$choices['choicesNo']===(int)$correct['cNo'])){
          $str .="<div class='choices correctAnswer'>{$choices['choicesContent']}</div>";
        }else if(((int)$choices['questionNo']===(int)$correct['qNo']) && ((int)$choices['choicesNo']!==(int)$correct['cNo'])){
          $str .="<div class='choices'>{$choices['choicesContent']}</div>";
        }
      }
    }    
  }
}



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diaper Adventure</title>
    <link rel="stylesheet" href="css/quiz.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
  </head>
<body>
  <?= $str ?>


  <a class="btn btn-custom01">
    <span class="btn-custom01-front">決定</span>
    <i class="fas fa-angle-right fa-position-right"></i>
  </a>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/quiz.js"></script>
    <div id="app"></div>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 
  </body>
</html>
