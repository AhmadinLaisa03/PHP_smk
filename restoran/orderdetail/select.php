<h3>Insert Kategori</h3>
<div class="form-group">
    <form action="" method="post">

        <div class="form-group w-50">
            <label for="kategori" class="mb-1">Tanggal Awal</label>
            <input type="date" name="tawal" id="kategori" class ="form-control mb-3" required>

            <label for="kategori" class="mb-1">Tanggal Akhir</label>
            <input type="date" name="takhir" id="kategori" class ="form-control mb-3" required>
        
            <input type="submit" name="simpan"  value="cari" class="btn-success p-1 ps-2 pe-2" style="border-radius:5px; border:none;">
        </div>

    </form>

</div>

<?php 

    //paging
    $banyak = 4;
    $jumlahdata = $db->rowCOUNT("SELECT idorderdetail FROM vorderdetail");
    $halaman = ceil($jumlahdata / $banyak);

    if (isset($_GET['p'])) {
        $p=$_GET['p'];
        $mulai=($p * $banyak)- $banyak;
    }else{  
        $mulai=0;
        }

    //query dari vorder dengan urutan descending

    $sql = "SELECT * FROM vorderdetail ORDER BY status DESC LIMIT $mulai,$banyak";

    if (isset($_POST['simpan'])) {
        $tawal = $_POST['tawal'];
        $takhir = $_POST['takhir'];

        $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$tawal' AND '$takhir' ";
        // echo $sql;
    }
    
    $row = $db->getALL($sql);

    //var_dump ($row);

    $no=1+$mulai;

    $total = 0;
?>

<table class="table table-bordered w-70 mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>jumlah</th>
            <th>Total</th>
            <th>alamat</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($row)) : ?>
            <?php foreach ($row as $r) : ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $r['pelanggan'] ?></td>
                    <td><?= $r['tglorder'] ?></td>
                    <td><?= $r['menu'] ?></td>
                    <td><?= $r['harga'] ?></td>
                    <td><?= $r['jumlah'] ?></td>
                    <td><?= $r['jumlah'] * $r['harga'] ?></td>
                    <td><?= $r['alamat'] ?></td>
                </tr>

                <?php 
                    $total = $total + $r['jumlah'] * $r['harga'];
                ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <tr>
            <td colspan=6><h2>Grand Total :</h2></td>
            <td colspan=2><h3><?= $total ?></h3></td>
        </tr>
    </tbody>
</table>

<?php 
    
    for ($i=1; $i<=$halaman ; $i++) { 
        echo '<a href="?f=orderdetail&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
        }

?>