<?php
    //operator matematika

    $a = 5;
    $b = 2;

    $c = $a + $b;
    echo $c.'<br>';

    $c = $a - $b;
    echo $c.'<br>';

    $c = $a * $b;
    echo $c.'<br>';

    $c = $a / $b;
    echo round($c).'<br>';

    $c = $a / $b;
    echo floor($c).'<br>';

    $c = $a % $b;
    echo $c.'<br><br>';

    //operator logika

    $c = $a > $b;
    echo $c.'<br>';

    $c = $a < $b;
    echo $c.'<br>';

    $c = $a == $b;
    echo $c.'<br>';

    $c = $a != $b;
    echo $c.'<br><br>';

    //increment

    $a++; //increment
    echo $a .'<br>';

    $a--; //decrement
    echo $a .'<br><br>';

    //operator string

    $kata = 'sura';
    $kota = 'baya';

    $hasil = $kata.$kota;
    $hasil.=' kota pahlawan';
    
    echo $hasil;

?>