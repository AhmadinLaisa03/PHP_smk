<?php 
    //paging

    $banyak = 4;
    $jumlahdata = $db->rowCOUNT("SELECT iduser FROM tbluser");
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai=($p * $banyak)- $banyak;
    }else{  
        $mulai=0;
    }

    //query dari tbluser dengan urutan ascending

    $sql = "SELECT * FROM tbluser ORDER BY user ASC LIMIT $mulai,$banyak";
    $row = $db->getALL($sql);

    //var_dump ($row);

    $no=1+$mulai;
?>

<div class="float-start me-4">
    <a class="btn btn-success" href="?f=user&m=insert" role="button">Insert New User</a>
    <!-- <a class="btn btn-success" href="#" role="button">Update Data</a>
    <a class="btn btn-success" href="#" role="button">Delete Data</a> -->
</div>
<h3>user </h3>
<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Email</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($row as $r) : ?>
            <?php 
                if ($r['aktif']==0) {
                    $status = "BANNED";
                }else {
                    $status = "AKTIF";
                }
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $r['user'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><?= $r['level'] ?></td>
                <td><a href="?f=user&m=delete&id=<?= $r['iduser'] ?>" onclick="return confirm('yakin?');">Delete</a></td>
                <td><a href="?f=user&m=update&id=<?= $r['iduser'] ?>"><?= $status; ?></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
    
    for ($i=1; $i<=$halaman ; $i++) { 
        echo '<a href="?f=user&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
        }

?>