<?php
    if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $sql="DELETE FROM tblmenu WHERE idmenu=$id";

        $db->runSQL($sql);

        header("Location:?f=menu&m=select");
        // $row=$db->getITEM($sql);
    }
?>