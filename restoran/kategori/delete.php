<?php
    if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $sql="DELETE FROM tblkategori WHERE idkategori=$id";

        $db->runSQL($sql);

        header("Location:?f=kategori&m=select");
        // $row=$db->getITEM($sql);
    }
?>