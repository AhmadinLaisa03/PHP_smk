<div class="float-start me-4">
    <a class="btn btn-success" href="?f=menu&m=insert" role="button">Insert New Data</a>
    <!-- <a class="btn btn-success" href="#" role="button">Update Data</a>
    <a class="btn btn-success" href="#" role="button">Delete Data</a> -->
</div>
<h3>Menu</h3>

<?php 
    if (isset($_POST['opsi'])) {
        $opsi=$_POST['opsi'];

        $where = "WHERE idkategori = $opsi";

        // echo $where;
    }else{
        $opsi=0;

        $where = "";
    }
?>

<div class="my-4">
    <?php 
        $row=$db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");    
    ?>
    <form action="" method="post">
        <select name="opsi" id="" onchange="this.form.submit()">
            <?php foreach ($row as $r) : ?>
                <option <?php if($r['idkategori']==$opsi) echo "selected"; ?> value="<?= $r['idkategori'] ?>">
                    <?= $r['kategori'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
</div>
    
<?php 
    //paging
    
    $jumlahdata = $db->rowCOUNT("SELECT idmenu FROM tblmenu $where");
    $banyak = 3;
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai=($p * $banyak)- $banyak;
    }else{  
        $mulai=0;
    }

    //query dari tblmenu dengan urutan ascending

    $sql = "SELECT * FROM tblmenu ".$where." ORDER BY menu ASC LIMIT $mulai,$banyak";
    $row = $db->getALL($sql);

    // echo $sql;

    //var_dump ($row);

    $no=1+$mulai;
?>

<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($row)) : ?>
            <?php foreach ($row as $r) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $r['menu'] ?></td>
                <td><?= $r['harga'] ?></td>
                <td><img src="../upload/<?= $r['gambar'] ?>" alt="" width="100px"></td>
                <td><a href="?f=menu&m=delete&id=<?= $r['idmenu'] ?>" onclick="return confirm('yakin?');">Delete</a></td>
                <td><a href="?f=menu&m=update&id=<?= $r['idmenu'] ?>">Update</a></td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php 
    
    for ($i=1; $i<=$halaman ; $i++) { 
        echo '<a href="?f=menu&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
        }

?>