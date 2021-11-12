<?php 
    // hapus keranjang
    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        unset($_SESSION['_'.$id]);

        header("location:?f=home&m=beli");
    }

    // tambah pesanan
    if (isset($_GET['tambah'])) {
        $id = $_GET['tambah'];
        $_SESSION['_'.$id]++;

        header("location:?f=home&m=beli");
    }

    // kurangi pesanan
    if (isset($_GET['kurang'])) {
        $id = $_GET['kurang'];
        $_SESSION['_'.$id]--;

        if ($_SESSION['_'.$id]==0) {
            unset($_SESSION['_'.$id]);
        }

        header("location:?f=home&m=beli");
    }

    if (!isset($_SESSION['pelanggan'])) {
        header("Location:?f=home&m=login");
    }else {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            isi($id);
            header("location:?f=home&m=beli");
        }else {
            keranjang();
        }
    }

    
    function isi($id){
        if (isset($_SESSION['_'.$id])) {
            $_SESSION['_'.$id]++;
        }else {
            $_SESSION['_'.$id]=1; 
        }   
    }

    function keranjang(){

        global $db;

        $total = 0;
        global $total;

        echo '
        <table class="table table-bordered w-70 mt-4">
        <div class="display-5">Keranjang</div>
        <thead>
            <tr>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Hapus</th>
            </tr>
        </thead>
    
        <tbody>';

        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<>'idpelanggan' && $key<>'user' && $key<>'level' && $key<>'iduser' && $key<>'pelanggan') {
                $id = substr($key,1);
                $sql = "SELECT * FROM tblmenu WHERE idmenu = $id";

                $row = $db->getALL($sql);

                if (!empty($row)) {
                    foreach ($row as $r) {
                        echo "<tr>";
                        echo "<td>".$r['menu']."</td>";
                        echo "<td>".$r['harga']."</td>";
                        echo "<td><a class= 'text-decoration-none text-success' href='?f=home&m=beli&tambah=".$r['idmenu']."'>+</a>&nbsp &nbsp &nbsp".$value."&nbsp &nbsp &nbsp<a class= 'text-decoration-none text-success' href='?f=home&m=beli&kurang=".$r['idmenu']."'>-</a></td>";
                        echo "<td>".$r['harga'] * $value."</td>";
                        echo "<td><a href='?f=home&m=beli&hapus=".$r['idmenu']."'>Hapus</a></td>";
                        echo "</tr>";

                        $total = $total + ($r['harga'] * $value);
                    }
                }
            }
        }

        echo '<tr>
            <td colspan=3><h3>Grand Total : </h3></td>
            <td colspan = 2"><h3>'.$total.'</h3></td>
        </tr>';

        echo '
        </tbody>
        </table>
        ';
    }
?>

<?php if(!empty($total)):?>

    <a class="btn btn-success" href="?f=home&m=checkout&total=<?= $total ?>" role="button">Check Out</a>

<?php endif; ?>