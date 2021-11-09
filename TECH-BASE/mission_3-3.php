<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>misson3-3</title>
</head>
<body>
    <form action="" method="post">
         <form action="" method="POST">
        名前
        <input type="text" name="na"><br>
        コメント
        <input type="text" name="co">
        <input type="submit" name="sub" ><br>
        <input type="text" name="del" placeholder="削除対象番号">
        <input type="submit" name="delt" value="削除">
    </form>
    <?php
    $file='mission_3-3.txt';
    $item=file($file,FILE_IGNORE_NEW_LINES);
    ini_set('disl',0);
    if($_POST['sub']){
        $na=$_POST['na'];
        $co=$_POST['co'];
        $day=date("Y/m/d H:i:s");
            if(!empty($na&&$co)){
                $item=file($file,FILE_IGNORE_NEW_LINES);
                $sui=count($item);
                $sui++;
                $fopen=fopen($file,'a');
                $fwrite=fwrite($fopen,$sui.'<>'.$na.'<>'.$co.'<>'.$day."\n");
                fclose($fopen);
                
                $item=file($file,FILE_IGNORE_NEW_LINES);
                foreach($item as $items){
                    echo $items.'<br>';
                }
            }
    }elseif($_POST['delt']){
        $deln=$_POST['del'];
        $fp=fopen($file,"a");
        ftruncate($fp,0);
        fclose($fp);
        for($i=0;$i<=count($item);$i++){
            $tm=explode("<>",$item[$i]);
            if($tm[0]==$deln){
                continue;
            }else{
                echo $item[$i]."<br>";
                $fopen2=fopen($file,'a');
                $fwrite2=fwrite($fopen2,$item[$i].PHP_EOL);
                fclose($fopen2);
            }
        }
    }
    ?>
</body>
</html>