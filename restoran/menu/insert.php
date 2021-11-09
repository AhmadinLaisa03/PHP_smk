<?php 
    $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC";
    $row=$db->getALL($sql);    
?>

<h3>Insert menu</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group w-50">
            <label for="menu" class="mb-1">Pilih Kategori</label>

            <br>

            <!-- isi di dalam select menu yang akan ditambah isi nya -->
            <select name="idkategori" id="" >
                <?php foreach ($row as $r) : ?>
                    <option value="<?= $r['idkategori'] ?>">
                        <?= $r['kategori'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <!-- nama menu -->
        <div class="form-group w-50">
            <label for="menu" class="mb-1">Nama Menu</label>
        
            <input type="text" name="menu" id="menu" class ="form-control mb-3" required placeholder="isi menu" autofocus>
        </div>
        <!-- input harga -->
        <div class="form-group w-50">
            <label for="harga" class="mb-1">Harga</label>
        
            <input type="text" name="harga" id="harga" class ="form-control mb-3" required placeholder="harga">
        </div>
        <!-- upload an gambar -->
        <div class="form-group w-50">
            <input type="file" name="gambar" id="gambar">
            <br>
            <input type="submit" name="simpan"  value="Simpan" class="btn-success p-1 ps-2 pe-2 mt-3" style="border-radius:5px; border:none;">
        </div>

    </form>

</div>

<?php 
    
    if (isset($_POST['simpan'])) {
        $idkategori = $_POST['idkategori'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        if (empty($gambar)) {
            echo "<h3>Pics Not found !</h3>";
        }else {
            $sql="INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar',$harga)";
            move_uploaded_file($tmp, '../upload/'.$gambar);

            $db->runSQL($sql);
            header("Location:?f=menu&m=select");
        }

        // $db->runSQL($sql);

        // header("Location:?f=menu&m=select");
    }

?>