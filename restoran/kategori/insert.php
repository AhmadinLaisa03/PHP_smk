<h3>Insert Kategori</h3>
<div class="form-group">
    <form action="" method="post">

        <div class="form-group w-50">
            <label for="kategori" class="mb-1">Nama Kategori</label>
        
            <input type="text" name="kategori" id="kategori" class ="form-control mb-3" required placeholder="isi kategori" autofocus>
        
            <input type="submit" name="simpan"  value="Simpan" class="btn-success p-1 ps-2 pe-2" style="border-radius:5px; border:none;">
        </div>

    </form>

</div>

<?php 
    
    if (isset($_POST['simpan'])) {
        $kategori = $_POST['kategori'];

        $sql="INSERT INTO tblkategori VALUES ('','$kategori')";
        $db->runSQL($sql);

        header("Location:?f=kategori&m=select");
    }

?>