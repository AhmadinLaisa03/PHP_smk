<div class="row">
            <div class="col-5" style="margin-left: 108px;">
                <div class="form-group bg-light shadow p-3">
                    <form action="" method="post">

                        <div>
                            <h3 class="mx-4 mb-4 text-center">Login Pelanggan Restoran</h3>
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
                            if (isset($_POST['login'])) {
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                
                                $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1 ";
                                $count = $db->rowCOUNT($sql);

                                if ($count == 0 ) {
                                    $wrongmsg = "<center><p class='text-danger mx-auto mt-1'>wrong email or password !</p></center>";
                                    echo $wrongmsg;
                                }else {
                                    $sql = "SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1 ";
                                    $row = $db->getITEM($sql);
                                    
                                    $_SESSION['pelanggan']=$row['email'];
                                    $_SESSION['idpelanggan']=$row['idpelanggan'];
                                    
                                    $wrongmsg = "";
                                    echo $wrongmsg;
                                    
                                    header("Location:index.php");
                                }
                            }
                        ?>
                    </form>
                </div>
            </div>
</div>