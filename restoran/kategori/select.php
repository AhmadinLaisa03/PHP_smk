<?php 
    //paging

    $banyak = 4;
    $jumlahdata = $db->rowCOUNT("SELECT idkategori FROM tblkategori");
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai=($p * $banyak)- $banyak;
    }else{  
        $mulai=0;
        }

    //query dari tblkategori dengan urutan ascending

    $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC LIMIT $mulai,$banyak";
    $row = $db->getALL($sql);

    //var_dump ($row);

    $no=1+$mulai;
?>

<div class="float-start me-4">
    <a class="btn btn-success" href="?f=kategori&m=insert" role="button">Insert New Data</a>
</div>
<h3>Kategori </h3>
<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($row)) : ?>
            <?php foreach ($row as $r) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $r['kategori'] ?></td>
                    <td><a href="?f=kategori&m=delete&id=<?= $r['idkategori'] ?>" onclick="return confirm('yakin?');">Delete</a></td>
                    <td><a href="?f=kategori&m=update&id=<?= $r['idkategori'] ?>">Update</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php 
    
    for ($i=1; $i<=$halaman ; $i++) { 
        echo '<a href="?f=kategori&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
        }

?>