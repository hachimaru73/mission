<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>mission_4-5</title>
  </head>
  <body>
    <?php
       $ $dsn = 'データベース名';
    $user = 'ユーザ名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    $sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
    $sql -> bindParam(':name', $na, PDO::PARAM_STR);
    $sql -> bindParam(':comment', $co, PDO::PARAM_STR);
    $na = '（清野菜名）';
    $co = '（大好き）';
    $sql -> execute();
    ?>
    </body>
    </html>