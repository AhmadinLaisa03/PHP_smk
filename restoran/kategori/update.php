<?php
    if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $sql="SELECT * FROM tblkategori WHERE idkategori=$id";

        $row=$db->getITEM($sql);
    }
?>

<h3>Update Kategori</h3>
<div class="form-group">
    <form action="" method="post">

        <div class="form-group w-50">
            <label for="kategori" class="mb-1">Nama Kategori</label>
        
            <input type="text" name="kategori" class ="form-control mb-3" required value="<?= $row['kategori'] ?>" autofocus>
        
            <input type="submit" name="simpan"  value="Simpan" class="btn-success p-1 ps-2 pe-2" style="border-radius:5px; border:none;">
        </div>

    </form>

</div>

<?php 
    
    if (isset($_POST['simpan'])) {
        $kategori = $_POST['kategori'];

        $sql="UPDATE tblkategori SET kategori= '$kategori' WHERE idkategori=$id";

        // echo $sql;

        $db->runSQL($sql);

        header("Location:?f=kategori&m=select");
    }

?>