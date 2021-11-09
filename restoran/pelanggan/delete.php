<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM tblpelanggan WHERE idpelanggan=$id";

        $db->runSQL($sql);

        header("Location:?f=pelanggan&m=select");
    }
?>