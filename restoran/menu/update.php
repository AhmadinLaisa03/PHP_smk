<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";
        
        $item = $db -> getITEM($sql);

        $idkategori = $item['idkategori'];

        // print_r($item);
    }
    $row=$db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");
?>

<h3>Update Menu</h3>
<div class="form-group">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group w-50">
            <label for="menu" class="mb-1">Kategori</label>

            <br>

            <select name="idkategori" id="" >
                <?php foreach ($row as $r) : ?>
                    <option <?php if ($idkategori == $r['idkategori']) echo "selected" ?> value="<?= $r['idkategori'] ?>">
                        <?= $r['kategori'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <!-- nama menu -->
        <div class="form-group w-50">
            <label for="menu" class="mb-1">Nama Menu</label>
        
            <input type="text" name="menu" id="menu" class ="form-control mb-3" required value="<?= $item['menu']; ?>" autofocus>
        </div>
        <!-- input harga -->
        <div class="form-group w-50">
            <label for="harga" class="mb-1">Harga</label>
        
            <input type="text" name="harga" id="harga" class ="form-control mb-3" required value="<?= $item['harga']; ?>">
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
        $gambar =$item['gambar'];
        $tmp = $_FILES['gambar']['tmp_name'];

        if (!empty($tmp)) {
            $gambar = $_FILES['gambar']['name'];
            move_uploaded_file($tmp, '../upload/'.$gambar);
        }

        $sql = "UPDATE tblmenu SET idkategori=$idkategori, menu='$menu', gambar='$gambar', harga=$harga WHERE idmenu = $id";

        $db->runSQL($sql);
        header("Location:?f=menu&m=select");
    }

        // if (empty($gambar)) {
        //     echo "<h3>Pics Not found !</h3>";
        // }else {
        //     $sql="INSERT INTO tblmenu VALUES ('',$idkategori,'$menu','$gambar',$harga)";
        //     move_uploaded_file($tmp, '../upload/'.$gambar);

        //     $db->runSQL($sql);
        //     header("Location:?f=menu&m=select");
        // }

        // $db->runSQL($sql);

        // header("Location:?f=menu&m=select");

?>