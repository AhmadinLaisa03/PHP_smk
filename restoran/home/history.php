<?php 
    //paging

    $email = $_SESSION['pelanggan'];

    $banyak = 4;
    $jumlahdata = $db->rowCOUNT("SELECT idorder FROM vorder WHERE email = '$email'");
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai=($p * $banyak)- $banyak;
    }else{  
        $mulai=0;
        }

    //query dari vorder dengan urutan descending

    $sql = "SELECT * FROM vorder WHERE email = '$email' ORDER BY tglorder DESC LIMIT $mulai,$banyak";
    $row = $db->getALL($sql);

    //var_dump ($row);

    $no=1+$mulai;
?>

<h3>Histori Pembelian</h3>
<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Detail</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($row)) : ?>
            <?php foreach ($row as $r) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $r['tglorder'] ?></td>
                    <td><?= $r['total'] ?></td>
                    <td><a href="?f=home&m=detail&id=<?= $r['idorder'] ?>">Detail</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php 
    
    for ($i=1; $i<=$halaman ; $i++) { 
        echo '<a href="?f=home&m=history&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
        }

?>