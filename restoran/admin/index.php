<?php 
    
    session_start();
    require_once "../dbcontroller.php";
    $db = new DB;

    if (!isset($_SESSION['user'])) {
        header("location:http://localhost/php_smk/restoran/admin/login.php");
    }

    if (isset($_GET['log'])) {
        session_destroy();

        header("Location:index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
    
    <div class="container">
        
        <div class="row">
            <div class="col-md-3">
                <h2>Restoran</h2>
            </div>

            <div class="col-md-9">
                <div class="float-end mt-4"><a href="?log=logout" onclick="return confirm('Logout ?');">Log out</a></div>
                <div class="float-end mt-4 me-4">User : <a href="?f=user&m=updateuser&id=<?= $_SESSION['iduser']; ?>"><?= $_SESSION['user']; ?></a></div>
                <div class="float-end mt-4 me-4">Level : <?= $_SESSION['level']; ?></a></div>
            </div>

        </div>

        <div class="row mt-5">
            <div class="col-md-3">
                <ul class="nav flex-column">
                    <?php 
                        $level = $_SESSION['level'];
                        switch ($level) {
                            case 'admin':
                                echo '
                                    <li class="nav-item"><a style="color: rgb(3, 141, 38);" href="?f=kategori&m=select" class="nav-link">Kategori</a></li>
                                    <li class="nav-item"><a style="color: rgb(3, 141, 38);" href="?f=menu&m=select" class="nav-link">Menu</a></li>
                                    <li class="nav-item"><a style="color: rgb(3, 141, 38);" href="?f=pelanggan&m=select" class="nav-link">Pelanggan</a></li>
                                    <li class="nav-item"><a style="color: rgb(3, 141, 38);" href="?f=order&m=select" class="nav-link">Order</a></li>
                                    <li class="nav-item"><a style="color: rgb(3, 141, 38);" href="?f=orderdetail&m=select" class="nav-link">Order Detail</a></li>
                                    <li class="nav-item"><a style="color: rgb(3, 141, 38);" href="?f=user&m=select" class="nav-link">User</a></li>
                                ';
                                break;

                            case 'koki':
                                echo '
                                    <li class="nav-item"><a style="color: rgb(3, 141, 38);" href="?f=orderdetail&m=select" class="nav-link">Order Detail</a></li>
                                ';
                                break;

                            case 'kasir':
                                echo '
                                    <li class="nav-item"><a style="color: rgb(3, 141, 38);" href="?f=order&m=select" class="nav-link">Order</a></li>
                                    <li class="nav-item"><a style="color: rgb(3, 141, 38);" href="?f=orderdetail&m=select" class="nav-link">Order Detail</a></li>
                                ';
                                break;

                            default:
                                echo 'tidak ada menu';
                                break;
                        }
                    ?>
                </ul>
            </div>

            <div class="col-md-9">
                <?php 
                    
                    if (isset($_GET['f']) && isset($_GET['m'])) {
                        $f = $_GET['f'];
                        $m = $_GET['m'];

                        $files='../'.$f.'/'.$m.'.php';

                        require_once $files;
                    }

                ?>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col ">
                <p class="text-center">&copy 2021 namatoko.com</p>
            </div>
        </div>

    </div>

</body>
</html>