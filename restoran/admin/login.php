<?php 
    session_start();
    require_once "../dbcontroller.php";
    $db = new DB;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | Aplikasi Restoran SMK</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-4 mx-auto">
                <div class="form-group bg-light shadow px-5 py-5" style="margin-top:150px;">
                    <form action="" method="post">

                        <div>
                            <h3 class="mx-4 mb-4 text-center">Login User Restoran</h3>
                        </div>

                        <div class="form-group">
                            <!-- email -->
                            <label for="email" class="mb-1">Email</label>
            
                            <input type="email" name="email" id="email" class ="form-control mb-3" required placeholder="your email" autofocus>
                            <!-- password -->
                            <label for="password" class="mb-1">Password</label>
            
                            <input type="password" name="password" id="password" class ="form-control mb-3" required placeholder="your password">
            
                            <input type="submit" name="login"  value="Login" class="btn-success p-2 d-block mt-4 mx-auto w-50" style="border-radius:5px; border:none;">
                        </div>

                        <?php 
                            $wrongmsg = "";

                            if (isset($_POST['login'])) {
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                
                                $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'  ";
                                $count = $db->rowCOUNT($sql);

                                if ($count == 0 ) {
                                    $wrongmsg = "<center><p class='text-danger mx-auto mt-1'>wrong email or password !</p></center>";
                                }else {
                                    $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password' AND aktif=1 ";
                                    $row = $db->getITEM($sql);

                                    $_SESSION['user']=$row['email'];
                                    $_SESSION['level']=$row['level'];
                                    $_SESSION['iduser']=$row['iduser'];


                                    header("Location:index.php");
                                }
                            }
                        ?>
                        
                        <div>
                            <h5><?= $wrongmsg; ?></h5>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
