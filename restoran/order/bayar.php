<?php
    if (isset($_GET['id'])) {
        $id=$_GET['id'];

        $sql="SELECT * FROM tblorder WHERE idorder=$id";

        $row=$db->getITEM($sql);
    }
?>

<h3>Pembayaran</h3>
<div class="form-group">
    <form action="" method="post">

        <div class="form-group w-50">
            <label for="total" class="mb-1">Total</label>
        
            <input type="number" name="total" class ="form-control mb-3" required value="<?= $row['total'] ?>" autofocus>

            <label for="bayar" class="mb-1">Bayar</label>

            <input type="number" name="bayar" class ="form-control mb-3" required>
        
            <input type="submit" name="simpan"  value="bayar" class="btn-success p-1 ps-2 pe-2" style="border-radius:5px; border:none;">
        </div>

    </form>

</div>

<?php 
    
    if (isset($_POST['simpan'])) {
        $total = $row['total'];
        $bayar = $_POST['bayar'];
        
        if ($bayar >= $total) {
            $kembali = $bayar - $total;

            $sql="UPDATE tblorder SET bayar = $bayar, kembali = $kembali, status = 1 WHERE idorder=$id";

            // echo $sql; 

            $db->runSQL($sql);

            header("Location:?f=order&m=info");
        }else {
            $kembali = '';
            echo "<p class='display-6 text-danger'>Uang anda kurang</p>";
        }
    }

?>