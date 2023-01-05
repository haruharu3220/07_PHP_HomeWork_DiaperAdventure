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
$sql = 'SELECT * FROM Diaper ORDER BY DiaperID ASC';
$stmt = $pdo->prepare($sql);



try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($result);
// echo '</pre>';
// exit();

$str='';
$test2 =1;
foreach($result as $record){
  $str .= "<div class=diapers {$test2}>{$record['diaperName']}</div>";
  $test2++; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiaperAdventure</title>
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
</head>
<body>
<h1>おむつの大冒険</h1>
<i class="fa-thin fa-poo"></i>
<h2>おむつの大冒険</h2>
<p>プレイヤーを選択してください。</p>
<p>＊はるあ愛用おむつは吸収力が２倍</p>

<?= $str ?>

<a class="btn btn-custom01">
  <span class="btn-custom01-front">決定</span>
  <i class="fas fa-angle-right fa-position-right"></i>
</a>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>