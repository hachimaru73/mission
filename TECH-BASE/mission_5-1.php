<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>mission_5-1</title>
  </head>
  <body>
 <?php
 ini_set('display_errors',0);
       //データベースに接続   
     $dsn = 'データベース名';
    $user = 'ユーザ名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    

  $sql = "CREATE TABLE IF NOT EXISTS AAA"
        ." ("
        . "id INT AUTO_INCREMENT PRIMARY KEY,"
        . "name char(32),"
        . "comment TEXT,"
        . "date DATETIME,"
        . "password TEXT"
        .");";
    $stmt = $pdo->query($sql);

    
    

    //name comment passが埋まっていて、編集判断用の$karaが空いていたら
    if (!empty($_POST['name']) && !empty($_POST['comment'])&& !empty($_POST['password'])&& empty($_POST['kara'])){
        $sql = $pdo -> prepare("INSERT INTO AAA (name, comment, date, password) VALUES (:name, :comment, :date, :password)");
        $sql -> bindParam(':name', $name, PDO::PARAM_STR);
        $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
        $sql -> bindParam(':date', $date, PDO::PARAM_STR);
        $sql -> bindParam(':password', $password, PDO::PARAM_STR);
        $name = ($_POST["name"]);
        $comment = ($_POST["comment"]);
        $password = ($_POST["password"]);
        $date = date("Y/m/d H:i:s");
        $sql -> execute();
    }

 //削除機能
            if(!empty($_POST["delete"]) && !empty($_POST["dpass"]))
            {
              $id = $_POST["delete"];
              $delpass = $_POST["dpass"];
              $sql = 'SELECT * FROM AAA WHERE id=:id ';  
              $stmt = $pdo->prepare($sql);                  
              $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
              $stmt->execute();                             
              $results = $stmt->fetchAll(); 
              foreach ($results as $row)
              {  
                if($row["id"]==$id && $row["password"]==$delpass)
                {
                $sql = 'delete from AAA where id=:id';
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                }
              }
            }

    //編集の対象を抽出
    if(!empty($_POST["edit"]) && !empty($_POST["epass"]))
    {
        $id = $_POST["edit"]; //変更する投稿番号
        $editpass = $_POST["epass"];
        $sql = 'SELECT * FROM AAA WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll();
        foreach($results as $row2)
        {
             if($row["id"] == $id && $pass == $epass)
            {
                $results[0] = $row2["id"];
                $results[1] = $row2["name"];
                $results[2] = $row2["comment"];
            }
            
        }
    }
    
    //編集を実行
    if(!empty($_POST["kara"]))
    {
        $id=$_POST["kara"];
        $name=$_POST["name"];
        $comment=$_POST["comment"];
        $sql = 'UPDATE AAA SET name=:name,comment=:comment WHERE id=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();   
        
    }


    
    
   

?>

    <!--変数をvalueに入れて投稿フォーム記述-->
    <form action="mission_5-1.php" method="post">
        <input type="text" name="name" placeholder="名前" value="<?php if(!empty($row2['name'])){echo $row2['name'];}?>"></br>
        <input type="text" name="comment" placeholder="コメント" value="<?php if(!empty($row2['comment'])){echo $row2['comment'];}?>"></br>
        <input type="text" name="password" placeholder="パスワード">
        <input type="submit" name="" value="投稿"></br>
    <!--編集判断材料text  あとで隠す-->
        <input type="text" name="kara" value="<?php if(!empty($row2['id'])){echo $row2['id'];}?>">
    </form></br>

    <!-- 削除フォームと編集フォーム-->
    <form action="" method="post">
        <input type="text" name="delete" placeholder="削除対象番号"></br>
        <input type="text" name="dpass" placeholder="パスワード">
        <input type="submit" name="" value="削除"></br>
    </form></br>

    <form action="" method="post">
        <input type="text" name="edit" placeholder="編集対象番号"></br>
        <input type="text" name="epass" placeholder="パスワード">
        <input type="submit" name="" value="編集"></br>
    </form></br>
    
    <?php
    
    //表示
    $sql = 'SELECT * FROM AAA';
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();
    foreach ($results as $row){
        //$rowの中にはテーブルのカラム名が入る
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].',';
        echo $row['date'].',';
    echo "<hr>";
    }
    
    
                
    ?>

</body>
</html>