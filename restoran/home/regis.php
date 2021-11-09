<h3>Insert Pelanggan</h3>
<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <!-- pelanggan input -->
            <label for="pelanggan">Pelanggan</label>
            <input type="text" name="pelanggan" id="pelanggan" class="form-control mb-3" placeholder="isi pelanggan" required autofocus autocomplete="off">
            
            <!-- alamat -->
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control mb-3" placeholder="isi alamat" required autofocus autocomplete="off">

            <!-- telp -->
            <label for="telp">Telp</label>
            <input type="text" name="telp" id="telp" class="form-control mb-3" placeholder="isi telp" required autofocus autocomplete="off">

            <!-- email input -->
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control mb-3" placeholder="isi email" required autocomplete="off">

            <!-- password input -->
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control mb-3" placeholder="isi password" required>

            <!-- konfirmasi password input -->
            <label for="konfirmasi">Konfirmasi Password</label>
            <input type="password" name="konfirmasi" id="konfirmasi" class="form-control mb-3" placeholder="konfirmasi password" required>
            
            <!-- tombol submit -->
            <input type="submit" name="simpan"  value="Simpan" class="btn-success p-1 ps-2 pe-2 mt-4" style="border-radius:5px; border:none;">
        </div>
    </form>
</div>
<?php
    if (isset($_POST['simpan'])) {
        $pelanggan = $_POST['pelanggan'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        if ($password === $konfirmasi) {
            $sql = "INSERT INTO tblpelanggan VALUES('','$pelanggan','$alamat','$telp','$email','$password',1)";
            $db->runSQL($sql);
            header("location:f=home&m=info");
        }else{
            echo"<center><p class='text-danger'>Konfirmasi password salah !</p></center>";
        }
    }
?>