<?php
    function selectTbl(){
        global $conn;
        $sql = "SELECT * FROM tbjaringan";
        $perintah = mysqli_query($conn, $sql);
        if(!$perintah) die("Gagal memilih tabel :" .$conn->connect_error());
        return $perintah;
    }
    function deleteMultiTbl($jaringan){
    global $conn;
        if(isset($_POST['proses'])){

            $mac = $_POST['macAddress'];
            $jum = count($mac);

                for($i=0; $i<$jum; $i++){
                    mysqli_query($conn, "DELETE FROM tbjaringan WHERE macAddress='$mac[$i]'")
                    or die (mysqli_error($conn));
                }
        }
    }

?>