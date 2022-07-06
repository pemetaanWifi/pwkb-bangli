<?php
    require "conn.php";
    $macAddress = isset($_POST["macAddress"])? $_POST["macAddress"] : "";
    $ssid = isset($_POST["ssid"]) ? $_POST["ssid"] : "";
    $level = isset($_POST["level"]) ? $_POST["level"] : "";
    $frequency = isset($_POST["frequency"]) ? $_POST["frequency"] : "";
    $capability = isset($_POST["capability"]) ? $_POST["capability"] : "";
    $location = isset($_POST["location"]) ? $_POST["location"] : "";
    
  
    if($conn == true){
        $sql_macaddr = "SELECT * FROM tbjaringan WHERE macaddress LIKE '$macAddress'";
        $macaddr_check = pg_query($conn, $sql_macaddr);
        if($macAddress == ""){
            echo "This an empty data";
        }        
        else if(pg_num_rows($macaddr_check) > 0){
            $sql_level = "SELECT level FROM tbjaringan WHERE macaddress LIKE '$macAddress'";
            $level_check = pg_query($conn, $sql_level);
            $level_check_fetch = pg_fetch_array($level_check);
            if($level >= $level_check_fetch[0]){
                $sql_register = "UPDATE tbjaringan SET level='$level',location='$location' WHERE macaddress LIKE '$macAddress'";
                if(pg_query($conn,$sql_register)){
                    echo "Data diperbarui";
                }else{
                    echo "Gagal memperbarui data";
                }
            }
            else{
                echo "Data yang sama telah tersimpan";
            }
        }
        else{
            $sql_register = "INSERT INTO tbjaringan (macaddress,ssid,level,frequency,capability,location) VALUES ('$macAddress','$ssid','$level','$frequency','$capability','$location')";
            if(pg_query($conn,$sql_register)){
                echo "Data ditambahkan";
            }else{
                echo "gagal menambahkan data";
            }
        }
    }
    else{
        echo "Connection Error";
    }
?>
