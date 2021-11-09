<?php
    /* echo 'test'; */

    function belajar(){
        echo 'saya belajar php';
    }

    function luaspersegi($p = 5, $l = 3){
        $luas = $p * $l;

        echo $luas;
    }

    luaspersegi(10, 40);

    function luas($p = 5, $l = 3){
        $luas = $p * $l;

        return $luas;
    }

    echo "<br>";

    function output(){
        return 'belajar function';
    }

    echo '<h1>'.output().'</h1>';

    echo luas(5,4) * 7;
?>