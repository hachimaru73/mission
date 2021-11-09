<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-1</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="na" value="コメント">
        <input type="submit" name="submit" >
    </form>
    <?php
            echo $_GET["na"]."を受け付けました";
    ?>
</body>
</html>