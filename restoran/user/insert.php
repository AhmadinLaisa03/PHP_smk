<h3>Insert User</h3>

<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <!-- user input -->
            <label for="user">User</label>

            <input type="text" name="user" id="user" class="form-control mb-3" placeholder="isi user" required autofocus autocomplete="off">

            <!-- email input -->
            <label for="email">Email</label>

            <input type="email" name="email" id="email" class="form-control mb-3" placeholder="isi email" required autocomplete="off">

            <!-- password input -->
            <label for="password">Password</label>

            <input type="password" name="password" id="password" class="form-control mb-3" placeholder="isi password" required>

            <!-- konfirmasi password input -->
            <label for="password">Konfirmasi Password</label>

            <input type="password" name="konfirmasi" id="password" class="form-control mb-3" placeholder="konfirmasi password" required>

            <!-- level input -->
            <label for="level">Level</label>

            <select name="level" id="level">
                <option value="admin">Admin</option>
                <option value="koki">Koki</option>
                <option value="kasir">Kasir</option>
            </select>

            <br>
            
            <!-- tombol submit -->
            <input type="submit" name="simpan"  value="Simpan" class="btn-success p-1 ps-2 pe-2 mt-4" style="border-radius:5px; border:none;">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $password = hash('sha256', $_POST['password']);
        $konfirmasi = hash('sha256',$_POST['konfirmasi']);
        $level = $_POST['level'];

        if ($password == $konfirmasi) {
            $sql = "INSERT INTO tbluser VALUES ('','$user','$email','$password','$level',1)";
            // echo $sql;

            $db->runSQL($sql);
            header("Location:?f=user&m=select");
        }else {
            echo "<h2 class='text-danger mt-1'>Konfirmasi Password salah !</h2>";
        }
    }
?>