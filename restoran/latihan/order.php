<?php

    //koneksi
    require_once "../function.php";

    // $id = 2;

    $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC";
    echo $sql;

    $result = mysqli_query($koneksi, $sql);

    //header("location:http://localhost/php_smk/restoran/kategori/select.php")

?>