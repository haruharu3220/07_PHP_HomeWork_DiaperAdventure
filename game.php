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
    <title>Diaper Adventure</title>
    <style>
      body {
        margin: 0;
        padding: 0;
      }
      #app {
        width: 800px;
        height: 400px;
        background: black;
        position: relative;
        overflow: hidden;
        left: 0;
        top: 0;
        cursor: none;
      }
    </style>


</head>
<body>
    <p>あなたの選んだキャラクターは</p>
    <p class=selectChara></p>
    <p>です。</p>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/quiz.js"></script>
    <div id="app"></div>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>

      // マウスイベントクラス
      class Mouse {
        constructor() {
          this.click = false
          $('#app').mousemove(e => {
            this.x = e.clientX
            this.y = e.clientY
          })
          $('#app').mousedown(() => this.click = true)
          $('#app').mouseup(() => this.click = false)
        }
      }

      // キャラクタークラス
      let character_no = 1
      class Character {
        constructor(class_name, color) {
          this.id_name = `character${character_no}`
          this.is_show = true
          character_no++
          $('#app').append(`<i id="${this.id_name}" class="fas ${class_name}"></i>`)
          this.$.css({
            position: 'absolute',
            color: color
          })
        }
        get $() { return $('#' + this.id_name) }
        get x() { return this.$.offset().left }
        get y() { return this.$.offset().top }
        get width() { return this.$.width() }
        get height() { return this.$.height() }
        set x(x) {
          this.$.offset({ left: x, top: this.y })
        }
        set y(y) {
          this.$.offset({ left: this.x, top: y })
        }
        show() {
          this.$.css({visibility: 'visible'})
          this.is_show = true
        }
        hide() {
          this.$.css({visibility: 'hidden'})
          this.is_show = false
        }
        hit(target) {
          if (this.x + this.width >= target.x && this.x < target.x + target.width
            && this.y + this.height >= target.y && this.y < target.y + target.height)
            return true
          return false
        }
      }

      // 弾クラス
      class Bullet extends Character {
        move() {
          if (this.is_show) {
            this.x += 12
            if (this.x > 800) this.hide()
          }
        }
      }

      // 自機クラス
      class Player extends Character {
        constructor(class_name, color) {
          super(class_name, color)
          this.mouse = new Mouse()
          this.bullet = new Bullet('fa-toggle-on', 'gold')
          this.bullet.hide()
        }
        move() {
          this.x = this.mouse.x - this.width / 2
          this.y = this.mouse.y - this.height / 2
          if (this.mouse.click && !this.bullet.is_show) {
            this.bullet.x = this.mouse.x - this.bullet.width / 2
            this.bullet.y = this.mouse.y - this.bullet.height / 2
            this.bullet.show()
            this.mouse.click = false
          }
          this.bullet.move()
        }
      }

      // 敵クラス
      class Enemy extends Character {
        move() {
          this.x -= 6
          if (this.x < -100) {
            this.x = 800
            this.y = Math.random() * (400 - this.height)
          }
        }
      }

      // メインループ
      $(() => {
        const player = new Player('fa-fighter-jet fa-3x', 'lightskyblue')
        const enemy = new Enemy('fa-helicopter fa-flip-horizontal fa-3x', 'coral')
        enemy.x = -100
        setInterval(() => {
          player.move()
          enemy.move()
          if (player.bullet.hit(enemy)) {
            player.bullet.hide()
            enemy.x = -100
          }
        }, 16)
      })
    </script>


  </body>
</html>
