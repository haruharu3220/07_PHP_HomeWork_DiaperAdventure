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
<h1>Diaper Adventure</h1>
<i class="fa-thin fa-poo"></i>
<h2>おむつの大冒険</h2>
<p>プレイヤーを選択してください。</p>
<p>＊はるあ愛用おむつは吸収力が２倍</p>

<?php include('./news.php'); ?>

<a class="btn btn-custom01">
  <span class="btn-custom01-front">決定</span>
  <i class="fas fa-angle-right fa-position-right"></i>

</a>



<p>テスト：question1=<?=$question1?>です。</p>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>