<?php 
    
    if (isset($_GET['total'])) {
        $total = $_GET['total'];

        $idorder = idorder();
        $idpelanggan = $_SESSION['idpelanggan'];
        $tgl = date('d-m-y');

        $sql = "SELECT * FROM tblorderdetail WHERE idorder = $idorder";

        $count = $db->rowCOUNT($sql) ;

        if ($count == 0) {
            insertorder($idorder, $idpelanggan, $tgl, $total);
            insertorderdetail($idorder);
        }else {
            insertorderdetail($idorder);
        }

        emptysession();
        header("location:?f=home&m=checkout");
    }else {
        info();
    }

    function idorder(){
        global $db;
        $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";
        $jumlah = $db->rowCOUNT($sql);

        if ($jumlah == 0) {
            $id = 1;
        } else {
            $item = $db->getITEM($sql);
            $id = $item['idorder']+1;
        }

        return $id;
        
    }

    function insertorder($idorder, $idpelanggan, $tgl, $total){
        global $db;

        $sql ="INSERT INTO tblorder VALUES ($idorder, $idpelanggan, '$tgl', $total, 0, 0, 0)";

        $db->runSQL($sql);
    }

    function insertorderdetail($idorder){
        global $db;

        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<>'idpelanggan') {
                $id = substr($key,1);
                
                $sql = "SELECT * FROM tblmenu WHERE idmenu = $id";
    
                $row = $db->getALL($sql);
                
                foreach ($row as $r) {
                    $idmenu = $r['idmenu'];
                    $idharga = $r['harga'];

                    $sql = "INSERT INTO tblorderdetail VALUES('', $idorder, $idmenu, $value, $idharga)";
                    $db->runSQL($sql);
                }
            }
        }
    }

    function emptysession(){

        
        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<>'idpelanggan') {
                $id = substr($key,1);
                
                unset($_SESSION['_'.$id]);

            }
        }
    }

    function info(){
        echo "<p class='display-5'>Terimakasih sudah berbelanja !</p>";
    }


?>