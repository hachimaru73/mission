<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>mission_3-5</title>
  </head>
  <body>
<?php
    $file_name = "mission3_5.txt";
    $fp = fopen($file_name, "a");
    $password = "passN";

  ?>
    <?php
      $na = "";
      $comm = "";
      $e_number = 0;
      
      $comments = file($file_name, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      if(!empty($_POST["edit"]) && $password == $_POST["e_pass"]){
        $e_number = $_POST["edit"];
      
        foreach($comments as $comment) {
          $splits = explode("<>", $comment);
          if($splits[0] == $e_number) {  
            $na = $splits[1];
            $comm = $splits[2];
            break 1;
          }
        }
      }

    ?>
    
    <form action="" method="POST">
     <input type="hidden" name="judge" value = "<?php if($e_number != 0) echo $e_number; ?>" > 
    <input type="text" name="name" value = "<?php echo $na; ?>" placeholder="名前"> <br>
    <input type="text" name="comment" value = "<?php echo $comm; ?>" placeholder="コメント"> <br>
    <input type="password" name="comme_pass" placeholder="パスワード"><br>
    <input type="submit" value="送信"><br>
    <input type="text" name="delete" value="" placeholder="削除番号"> <br>
    <input type="password" name="delete_pass" placeholder="パスワード"> <br>
    <input type="submit" value="削除"><br>
    <input type="text" name="edit" value="" placeholder="編集番号"><br>
    <input type="password" name="e_pass" placeholder="パスワード"><br>
    <input type="submit" value="編集">
     </form>

  <hr>

  <?php
    if(!empty($_POST["judge"]) ) { 
      $comments = file($file_name, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      $when = date("Y年m月d日 H:i:s")."<br>";
      $order = 0;
      foreach($comments as $comme){
        $split = explode("<>",$comme);
        if($_POST["judge"] == $split[0]){
          $when = date("Y年m月d日 H:i:s")."<br>";
          $comments[$order] = $_POST["judge"]. "<>". $_POST["name"]. "<>". $_POST["comment"]. "<>". $when;
          break 1;
        }
        $order++;
      }

      ftruncate($fp,0);
      fseek($fp, 0, SEEK_SET);

      foreach($comments as $comme){
        fwrite($fp, $comme.PHP_EOL);  
      }

    }
    elseif(!empty($_POST["name"]) && !empty($_POST["comment"]) && $password == $_POST["comme_pass"]) { 
      $comments = file($file_name, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      $last_comment = $comments[(count($comments) - 1)];
      $split = explode("<>", $last_comment);
      $last_number = $split[0]; 
      $order = $last_number + 1;
      $when = date("Y年m月d日 H:i:s")."<br>";
      $comme = $order."<>".$_POST["name"]."<>".$_POST["comment"]."<>".$when;
      fwrite($fp, $comme.PHP_EOL);
    }
    elseif(!empty($_POST["delete"]) && $password == $_POST["delete_pass"]) { 
      $comments = file($file_name, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); 
      ftruncate($fp, 0);
      fseek($fp, 0, SEEK_SET); 

      foreach($comments as $comme) {
        $splits = explode("<>", $comme);
        if($splits[0] != $_POST["delete"]) {
          fwrite($fp, $comme.PHP_EOL);
        }
      }
    }

    $comments = file($file_name);

    foreach($comments as $comment) {
      $splits = explode("<>", $comment);
      for($i = 0; $i < count($splits); $i++) {
        echo $splits[$i]." ";
      }
    }

    fclose($fp);

  ?>
  
</body>
</html>