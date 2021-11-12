<?php 
    //paging
    $banyak = 4;
    $jumlahdata = $db->rowCOUNT("SELECT idorder FROM vorder");
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai=($p * $banyak)- $banyak;
    }else{  
        $mulai=0;
        }

    //query dari vorder dengan urutan descending

    $sql = "SELECT * FROM vorder ORDER BY status DESC LIMIT $mulai,$banyak";
    $row = $db->getALL($sql);

    //var_dump ($row);

    $no=1+$mulai;
?>

<h3>Order Pembelian</h3>
<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Bayar</th>
            <th>Kembali</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($row)) : ?>
            <?php foreach ($row as $r) : ?>

                <?php
                    if ($r['status'] == 0) {
                        $status = '<td><a href="?f=order&m=bayar&id='.$r['idorder'].'">Bayar</a></td>';
                    }else {
                        $status = '<td>Lunas</td>';
                    }
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $r['pelanggan'] ?></td>
                    <td><?= $r['tglorder'] ?></td>
                    <td><?= $r['total'] ?></td>
                    <td><?= $r['bayar'] ?></td>
                    <td><?= $r['kembali'] ?></td>
                    <?= $status ?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php 
    
    for ($i=1; $i<=$halaman ; $i++) { 
        echo '<a href="?f=order&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
        }

?>