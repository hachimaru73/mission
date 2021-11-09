<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission1-27</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="num" placeholder="数字を入力してください">
        <input type="submit" name="submit">
    </form>
<?php
$str = "Fizz-Buzz";
$filename="mission1-27.txt";
$fp = fopen($filename,"a");
fwrite($fp, $str.PHP_EOL);
fclose($fp);
echo "書き込み成功！<br>";

$num = $_POST["num"];
 if ($num % 3 == 0 && $num % 5 == 0) {
 echo "FizzBuzz<br>";
 } elseif ($num % 3 == 0) {
 echo "Fizz<br>";
 } elseif ($num % 5 == 0) {
 echo "Buzz<br>";
 } else {
 echo $num . "<br>";
        }
        

$num=3;
    if($num%3==0 && $num%5==0){
        echo "FizzBuzz<br>";
    }elseif ($num%3==0){
        echo "Fizz<br>";
    }elseif($num%5==0){
        echo "Buzz<br>";
    }else{
        echo $num . "<br>";
    }
     $num=10;
    if($num%3==0 && $num%5==0){
        echo "FizzBuzz<br>";
    }elseif ($num%3==0){
        echo "Fizz<br>";
    }elseif($num%5==0){
        echo "Buzz<br>";
    }else{
        echo $num . "<br>";
    }
     $num=13;
    if($num%3==0 && $num%5==0){
        echo "FizzBuzz<br>";
    }elseif ($num%3==0){
        echo "Fizz<br>";
    }elseif($num%5==0){
        echo "Buzz<br>";
    }else{
        echo $num . "<br>";
    }
     $num=15;
    if($num%3==0 && $num%5==0){
        echo "FizzBuzz<br>";
    }elseif ($num%3==0){
        echo "Fizz<br>";
    }elseif($num%5==0){
        echo "Buzz<br>";
    }else{
        echo $num . "<br>";
    }
         $num=4;
    if($num%3==0 && $num%5==0){
        echo "FizzBuzz<br>";
    }elseif ($num%3==0){
        echo "Fizz<br>";
    }elseif($num%5==0){
        echo "Buzz<br>";
    }else{
        echo $num . "<br>";
    }
    
?>

</body>
</html>