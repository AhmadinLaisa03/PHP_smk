<?php 
    
    session_start();
    require_once "dbcontroller.php";
    $db = new DB;

    $sql = "SELECT * FROM tblkategori ORDER BY kategori ASC";

    $row = $db->getALL($sql);

    if (isset($_GET['log'])) {
        session_destroy();

        header("Location:index.php");
    }

    function cart(){
        global $db;

        $cart = 0;

        // var_dump($_SESSION);

        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<>'idpelanggan' && $key<>'user' && $key<>'level' && $key<>'iduser' && $key<>'pelanggan') {
                $id = substr($key,1);
                
                $sql = "SELECT * FROM tblmenu WHERE idmenu = $id";
    
                $row = $db->getALL($sql);
                
                foreach ($row as $r) {
                    $cart++;
                }
            }
        }

        return $cart;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
    
    <div class="container-fluid">
        <div class="row bg-success text-light">
            <div class="col-md-3">
                <h2 class="mt-3 mb-3"><a class="text-light" href="index.php">Restoran SMK</a></h2>
                </div> 

            <div class="col-md-9 text-light">
                <?php if(!isset($_SESSION['pelanggan'])){?>
                    <div class="float-end mt-4 mb-2 me-4"><a style="color: white;" href="?f=home&m=login">Log in</a></div>
                    <div class="float-end mt-4 mb-2 me-4"><a style="color: white;" href="?f=home&m=regis">Daftar</a></div>
                <?php }else{ ?>
                    <div class="float-end mt-4 mb-2 me-4"><a style="color: white;" href="?log=logout"  onclick="return confirm('Anda yakin ingin log out??');">Log out</a></div>
                    <div class="float-end mt-4 mb-2 me-4">Pelanggan : <?= $_SESSION['pelanggan']; ?></div>
                    <div class="float-end mt-4 mb-2 me-4">Cart : ( <a style="color: white;" href="?f=home&m=beli"><?= cart() ?></a> )</div>
                    <div class="float-end mt-4 mb-2 me-4"><a style="color: white;" href="?f=home&m=history">Histori</a></div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container">
        

        <div class="row mt-5">
            <div class="col-md-3">
                <div class="display-6 mb-5">Kategori</div>
                <?php if(!empty($row)): ?>
                    <?php foreach ($row as $r) :?>
                        <ul class="nav flex-column">
                            <li class="nav-item"><a style="color: rgb(3, 141, 38);" href="?f=home&m=product&id=<?= $r['idkategori'] ?>" class="nav-link"><?= $r['kategori']; ?></a></li>
                        </ul>
                    <?php endforeach ?>
                <?php endif ?>
            </div>

            <div class="col-md-9">
                <?php 
                    
                    if (isset($_GET['f']) && isset($_GET['m'])) {
                        $f=$_GET['f'];
                        $m=$_GET['m'];
                        
                        $file = $f."/".$m.".php";

                        require_once $file;
                    }else {
                        require_once ("home/product.php");
                    }

                ?>
            </div>
        </div>

        <div class="row mt-5 ">
            <div class="col">
                <p class="text-center">&copy 2021 namatoko.com</p>
            </div>
        </div>

    </div>

</body>
</html>