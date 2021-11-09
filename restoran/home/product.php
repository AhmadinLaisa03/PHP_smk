<h3 class="display-6">Menu</h3>

<div class="my-4">
    <?php 
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $where = "WHERE idkategori = $id";
            $id = "&id=".$id;
            // echo $where;
        }else {
            $where = "";
            $id = "";
        }
    ?>
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

    $sql = "SELECT * FROM tblmenu $where ORDER BY menu ASC LIMIT $mulai,$banyak";
    $row = $db->getALL($sql);

    // echo $sql;

    //var_dump ($row);

    $no=1+$mulai;
?>

<div>

        <?php if (!empty($row)) : ?>
            <?php foreach ($row as $r) : ?>
                <div class="card m-1" style="width: 15rem; float:left;">
                    <img style="height:170px;"class="card-img-top" src="upload/<?= $r['gambar'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $r['menu'] ?></h5>
                        <p class="card-text">Rp. <?= $r['harga'] ?></p>
                        <a class="btn btn-success" href="?f=home&m=beli&id=<?= $r['idmenu']?>" role="button">Masukkan ke keranjang</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
<div style="clear:both; display:flex; justify-content:center;" class="pt-5">
    <?php for ($i=1; $i<=$halaman ; $i++) :?>
        <div class="bg-success mx-2 rounded-1" style="width:20px; height:25px; padding-left:5px;">
            <a class="text-decoration-none text-light" href="?f=home&m=product&p=<?= $i.$id; ?>"><?= $i; ?></a>
            &nbsp &nbsp &nbsp
        </div>
    <?php endfor; ?>
</div>
