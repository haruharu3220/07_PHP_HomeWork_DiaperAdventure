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


var_dump($choices1_1 ):
exit();


// 各種項目設定
$dbn ='mysql:dbname=DiaperAdventure;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}


// SQL作成&実行
$sql = 'INSERT INTO Diaper (DiaperID, diaperName, absorbency, favoriteFlag)
                    VALUES (NULL, :name, 100,0)';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':name', $question1, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

?>

