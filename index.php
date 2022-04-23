
<?php
    $arr = array("key1" => 1,"key2" => 2, "key3" => 3);
    $a = 5;
    $b = "abc";
    $c = 10;
    $d = "123";
    $tong = $a + $c;
//    var_dump($tong);
//    var_dump($arr);
//    for($i = 0; $i < 3; $i++){
//        echo ($i . "->" . $arr[$i] . "<br>");
//    }
    foreach($arr as $key => $value){
        echo $key . "->" . $value . "<br>";
    }
?>