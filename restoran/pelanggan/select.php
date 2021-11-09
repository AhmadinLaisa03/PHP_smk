<?php 
    //paging

    $banyak = 4; //jumlah data per paging
    $jumlahdata = $db->rowCOUNT("SELECT idpelanggan FROM tblpelanggan"); //banyak baris di database
    $halaman = ceil($jumlahdata / $banyak); //jumlah halaman yang dapat dibuat dengan membagi variabel jumlah data dengan variabel banyak


    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai=($p * $banyak)- $banyak; //variabel untuk menentukan angka berapa yang menjadi awal di paging baru
    }else{  
        $mulai=0;
    }

    //query dari tblpelanggan dengan urutan ascending

    $sql = "SELECT * FROM tblpelanggan ORDER BY pelanggan ASC LIMIT $mulai,$banyak";
    $row = $db->getALL($sql);

    //var_dump ($row);

    $no=1+$mulai;
?>

<h3>Pelanggan </h3>
<table class="table table-bordered w-70">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Alamat</th>
            <th>Telpon</th>
            <th>email</th>
            <th>Delete</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($row as $r) : ?>

            <?php 
                if ($r['aktif']==1 ) {
                    $status = 'AKTIF';
                }else {
                    $status = 'TIDAK AKTIF';
                }
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $r['pelanggan'] ?></td>
                <td><?= $r['alamat'] ?></td>
                <td><?= $r['telp'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><a href="?f=pelanggan&m=delete&id=<?= $r['idpelanggan'] ?>" onclick="return confirm('yakin?');">Delete</a></td>
                <td><a href="?f=pelanggan&m=update&id=<?= $r['idpelanggan'] ?>"><?= $status; ?></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
    
    for ($i=1; $i<=$halaman ; $i++) { 
        echo '<a href="?f=pelanggan&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
        }

?>