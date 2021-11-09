<?php 
    if ($_GET['id']) {
        $id = $_GET['id'];

        $sql = "DELETE FROM tbluser WHERE iduser = $id";

        $db->runSQL($sql);
        header("Location:http://localhost/php_smk/restoran/admin/index.php?f=user&m=select");
    }
?>