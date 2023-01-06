# DiaperAdventure
## ルール説明　　
おむつがうんちを避けるアホゲーです。  
ゲーム開始前に子供に関するクイズが出てきます。  
正解率によって、難易度が変わります。  
ゲームをしながら子供のことを知ろう！目指せイクメンパパがコンセプトです。  
クイズは設定画面（裏画面）で作成可能です。  
問題と選択肢と正解がそれぞれDBに登録できます。  



## DEMO

  - デプロイしている場合はURLを記入（任意）

## 紹介と使い方


## 工夫した点
クイズの問題、選択肢、正解番号を後から変更しても影響範囲が少なくなるように  
それぞれ別テーブルに登録した。（データベース設計を意識したつもりだがあまり分かっていない）
HTML CSS JavaScrpt PHPそれぞれ使った。  

## 苦戦した点
PHPでエラーになった時、何でエラーになっているのか分かりにくかった。  
DBやPHPを使わない画面はhtmlファイルにするだろうけど  
ついついPHPファイルにしてしまう。
人生初Macを使った開発だが、使用感に慣れず開発以外の全般で効率が落ちてしまった。  
Macを使いこなしてスマホアプリ開発ができるようにしたい。  






■HTMLで困った
Font Awesomeが表示されない｜四角に文字化けする原因と対処法  
https://affiben.com/fontawesome-hidden/

■CSSで困った
imgタグを中央寄せしたい
https://style.potepan.com/articles/23332.html


■JavaScriptで困った  


■PHPで困った  
HTMLファイルでPHPを使って共通部分を管理する  
https://kigiroku.com/frontend/html-php.html  

PHP include  
https://www.php.net/manual/ja/function.include.php  


HTMLからPHPを読み込む
https://magazine.techacademy.jp/magazine/30930

header関数で指定したページにリダイレクト  
https://www.sejuku.net/blog/28054

文字列の中で変数展開する  
シングルクオーテーション( ' )で囲んだ文字列の中で変数を記述しても変数展開は行われません。  
https://www.javadrive.jp/php/string/index5.html  
http://www.dicre.com/php/php-stringembed

■SQLで困った
PHPMyAdminでカラムを後から追加  
https://xn--t8j3bz04sl3w.xyz/mysql/column-tuika-sakujo/6469/


PDOStatement::fetchAll  
https://www.php.net/manual/ja/pdostatement.fetchall.php

PDOStatement::execute  
https://www.php.net/manual/ja/pdostatement.execute.php



■トラブルシューティング  
①SQLSTATE[23000]: Integrity constraint violation 1048  
https://qiita.com/SuguruOoki/items/eb74d2c33ee9f023aaf1

②"sql error":"SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; 　　
https://qiita.com/SuguruOoki/items/8424ca4d9d454bb2e918


■素材集
シューティングゲーム  
https://qiita.com/naga3/items/19b261efbdd037c8730a  

おむつ  
https://osusume.mynavi.jp/articles/5881/

