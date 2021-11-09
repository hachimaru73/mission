<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-4</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="na" value="コメント">
        <input type="submit" name="submit" >
    </form>
    <?php
    $na=$_POST['na'];
    $file='mission_2-4.txt';
    $fopen=fopen($file,'a');
    $write=fwrite($fopen,$na.PHP_EOL);
    fclose($fopen);
     $items = file($file,FILE_USE_INCLUDE_PATH);
    foreach($items as $item){
        echo "おめでとう！by $item<br>";
    }
    
    ?>
</body>
</html>