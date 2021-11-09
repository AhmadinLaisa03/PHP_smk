<?php
    // array dimensi
    // $nama = array("joni", "tejo", "budi", "siti", 100, 2.5);

    // var_dump($nama);

    // echo '<br>';

    // for ($i=0; $i <=5 ; $i++) { 
    //     echo '<br>'. $nama[$i];
    // }

    // foreach ($nama as $key) {
    //     echo $key . '<br>';
    // }

    // array asosiatif

    $nama = array(
        "joni" => "surabaya",
        "budi" => "malang",
        "tejo" => "jakarta",
        "siti" => "sidoarjo"
    );

    var_dump($nama);

    echo '<br>';

    echo $nama['budi'];

    foreach ($nama as $key => $value) {
        echo '<br>'.$key.' => '.$value;
    }
?>