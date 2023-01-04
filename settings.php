<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiaperAdventure</title>
</head>
<body>
    <h1>設定画面</h1>
    <form action="verification.php" method="POST">
        <fieldset>
          <legend>問題１</legend>
          <div>
            問題文: <input type="text" name="question1">
          </div>
          <div>
            選択肢１: <input type="text" name="choices1_1">
            <input type="radio" id="contactChoice1_1" name="answer_contact1" value="choices1_1" />
          </div>
          <div>
            選択肢２: <input type="text" name="choices1_2">
            <input type="radio" id="contactChoice1_2" name="answer_contact1" value="choices1_2" />
          </div>
          <!-- <div>
            選択肢３: <input type="text" name="choices1_3">
            <input type="radio" id="contactChoice1_3" name="answer_contact1" value="choices1_3" />
          </div> -->
        </fieldset>

        <!-- <fieldset>
            <legend>問題２</legend>
            <div>
              問題文: <input type="text" name="question2">
            </div>
            <div>
              選択肢１: <input type="text" name="choices2_1">
              <input type="radio" id="contactChoice2_1" name="answer_contact2" value="choices2_3" />
            </div>
            <div>
              選択肢２: <input type="text" name="choices2_2">
              <input type="radio" id="contactChoice2_2" name="answer_contact2" value="choices2_3" />
            </div>
            <div>
              選択肢３: <input type="text" name="choices2_3">
              <input type="radio" id="contactChoice2_3" name="answer_contact2" value="choices2_3" />
            </div>
          </fieldset>        
          
          <fieldset>
            <legend>問題３</legend>
            <div>
              問題文: <input type="text" name="question3">
            </div>
            <div>
              選択肢１: <input type="text" name="choices3_1">
              <input type="radio" id="contactChoice3_1" name="answer_contact3" value="choices3_1" />
            </div>
            <div>
              選択肢２: <input type="text" name="choices3_2">
              <input type="radio" id="contactChoice3_2" name="answer_contact3" value="choices3_2" />
            </div>
            <div>
              選択肢３: <input type="text" name="choices3_3">
              <input type="radio" id="contactChoice3_3" name="answer_contact3" value="choices3_3" />
            </div>
          </fieldset>  -->
            <button>submit</button>
      </form>

</body>
</html>