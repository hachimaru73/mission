<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-2</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="na" value="コメント">
        <input type="submit" name="submit" >
    </form>
    <?php
            echo $_POST["na"]."を受け付けました<br>";
            $na=$_POST['na'];
            $file='mission_2-2.txt';
            $fopen=fopen($file,'a');
            $write=fwrite($fopen,$na.PHP_EOL);
            fclose($fopen);
            if($na=="できた！"){
                echo "お疲れ様です。";
            }else
    ?>
</body>
</html>