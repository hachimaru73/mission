<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-1</title>
</head>
<body>
    <form action="" method="POST">
        名前
        <input type="text" name="na"><br>
        コメント
        <input type="text" name="co">
        <input type="submit" name="submit" >
    </form>
    <?php
    $na=$_POST['na'];
    $co=$_POST['co'];
    $day=date("Y/m/d H:i:s");
    $file='mission_3-1.txt';
    $fopen=fopen($file,'a');
    $sui=count(file($file));
    $sui++;
    $write=fwrite($fopen,$sui.'<>'.$na.'<>'.$co.'<>'.$day."\n");
    fclose($fopen);
    ?>
</body>
</html>