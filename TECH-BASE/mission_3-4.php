<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>mission_3-4</title>
  </head>
  <body>

    <?php
      $filename = "mission_3-4.txt";
  if (!empty($_POST['name']) && !empty($_POST['comment'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $postedAt = date("Y年m月d日 H:i:s");
    if (empty($_POST['editNO'])) {
      if (file_exists($filename)) {
        $num = count(file($filename)) + 1;
      } else {
        $num = 1;
      }
      $newdata = $num . "<>" . $name . "<>" . $comment . "<>" . $postedAt;
      $fp = fopen($filename, "a");
      fwrite($fp, $newdata . "\n");
      fclose($fp);
    } else {
      $editNO = $_POST['editNO'];
      $ret_array = file($filename);
      $fp = fopen($filename, "w");
      foreach ($ret_array as $line) {
        $data = explode("<>", $line);
        if ($data[0] == $editNO) {
          fwrite($fp, $editNO . "<>" . $name . "<>" . $comment . "<>" . $postedAt . "\n");
        } else {
          fwrite($fp, $line);
        }
      }
      fclose($fp);
    }
  }      

      if (!empty($_POST['dnum'])) {
          $delete = $_POST['dnum'];
          $delCon = file($filename);
          $fp = fopen($filename,"w");
          foreach ($delCon as $line) {
                $deldata = explode("<>",$line);
                if ($delete !== $deldata[0]) {
                    fwrite($fp,$line);
                }
          }
          fclose($fp);
      }
      if (!empty($_POST['edit'])) {
          $edit = $_POST['edit'];
          $editCon = file($filename);
          foreach ($editCon as $line) {
              $editdata = explode("<>",$line);
              if ($edit == $editdata[0]) {
                  $editnumber = $editdata[0];
                  $editname = $editdata[1];
                  $editcomment = $editdata[2];
              }
            }
      }

      
    ?>

    <form action="mission_3-4.php" method="post">
      <input type="text" name="name" placeholder="名前" value="<?php if(isset($editname)) {echo $editname;} ?>"><br>
      <input type="text" name="comment" placeholder="コメント" value="<?php if(isset($editcomment)) {echo $editcomment;} ?>"><br>
      <input type="text" name="editNO" value="<?php if(isset($editnumber)) {echo $editnumber;} ?>">
      <input type="submit" name="submit" value="送信">
    </form>

    <form action="mission_3-4.php" method="post">
      <input type="text" name="dnum" placeholder="削除対象番号">
      <input type="submit" name="delete" value="削除">
    </form>

    <form action="mission_3-4.php" method="post">
      <input type="text" name="edit" placeholder="編集対象番号">
      <input type="submit" value="編集">
    </form>

    <?php
      $filemei = "mission_3-4.txt";
      if (file_exists($filemei)) {
          $array = file($filemei);
          foreach ($array as $word) {
                $getdata = explode("<>",$word);
                echo $getdata[0] . " " . $getdata[1] . " " . $getdata[2] . " " . $getdata[3] . "<br>";
          }
      }
    ?>
  </body>
</html>