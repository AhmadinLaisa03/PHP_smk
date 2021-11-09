<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbluser WHERE iduser = $id";
        $row = $db->getITEM($sql);

        //var_dump($row);
    }
?>
<h3>Update User</h3>

<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <!-- user input -->
            <label for="user">User</label>

            <input type="text" name="user" id="user" class="form-control mb-3"  value="<?= $row['user'];  ?>" required autofocus autocomplete="off">

            <!-- email input -->
            <label for="email">Email</label>

            <input type="email" name="email" id="email" class="form-control mb-3"  value="<?= $row['email'];  ?>" required autocomplete="off">

            <!-- password input -->
            <label for="password">Password</label>

            <input type="password" name="password" id="password" class="form-control mb-3"  value="<?= $row['password'];  ?>" required>

            <!-- konfirmasi password input -->
            <label for="password">Konfirmasi Password</label>

            <input type="password" name="konfirmasi" id="password" class="form-control mb-3" value="<?= $row['password'];  ?>" required>

            <!-- level input -->
            <label for="level">Level</label>

            <select name="level" id="level">
                <option value="admin" <?php if ($row['level']=="admin") echo "selected"; ?>>Admin</option>
                <option value="koki" <?php if ($row['level']=="koki") echo "selected"; ?>>Koki</option>
                <option value="kasir" <?php if ($row['level']=="kasir") echo "selected"; ?>>Kasir</option>
            </select>

            <br>
            
            <!-- tombol submit -->
            <input type="submit" name="simpan"  value="Simpan" class="btn-success p-1 ps-2 pe-2 mt-4" style="border-radius:5px; border:none;">
        </div>
    </form>
</div>

<?php 
    if (isset($_POST['simpan'])) {
        $user = htmlspecialchars($_POST['user']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $konfirmasi = htmlspecialchars($_POST['konfirmasi']);
        $level = htmlspecialchars($_POST['level']);

        if ($password == $konfirmasi) {
            $sql = "UPDATE tbluser SET user='$user',email='$email',password='$password',level='$level' WHERE iduser=$id";
            
            $db->runSQL($sql);
            header("Location:?f=user&m=select");
        }else {
            echo "<h2 class='text-danger mt-1'>Konfirmasi Password salah !</h2>";
        }
    }
?>