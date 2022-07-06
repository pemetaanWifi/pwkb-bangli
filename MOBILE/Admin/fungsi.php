<?php
    function selectTbl(){
        global $conn;
        $sql = "SELECT * FROM tbjaringan";
        $perintah = pg_query($conn, $sql);
        if(!$perintah) die("Gagal memilih tabel :" .$conn->connect_error());
        return $perintah;
    }
    function deleteMultiTbl($jaringan){
    global $conn;
        if(isset($_POST['proses'])){

            $mac = $_POST['macaddress'];
            $jum = count($mac);

                for($i=0; $i<$jum; $i++){
                    mysqli_query($conn, "DELETE FROM tbjaringan WHERE macaddress='$mac[$i]'")
                    or die (pg_result_error($conn));
                }
        }
    }

?>
