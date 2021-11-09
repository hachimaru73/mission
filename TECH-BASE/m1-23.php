<?php
    $items = array("あやか","あんどう","BOSS","ながす","なる");
    foreach($items as $item){
        if($item=="BOSS"){
            echo "Good morning $item!<br>";
        }else{
            echo "Hi! $item<br>";
        }
    }
?>