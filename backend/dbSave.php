<?php
    require "conn.php";
    $macAddress = isset($_POST["macAddress"])? $_POST["macAddress"] : "";
    $ssid = isset($_POST["ssid"]) ? $_POST["ssid"] : "";
    $level = isset($_POST["level"]) ? $_POST["level"] : "";
    $frequency = isset($_POST["frequency"]) ? $_POST["frequency"] : "";
    $capability = isset($_POST["capability"]) ? $_POST["capability"] : "";
    $location = isset($_POST["location"]) ? $_POST["location"] : "";
    
  
    if($conn == true){
        $sql_macaddr = "SELECT * FROM tbJaringan WHERE macAddress LIKE '$macAddress'";
        $macaddr_check = mysqli_query($conn, $sql_macaddr);
        if($macAddress == ""){
            echo "This an empty data";
        }        
        else if(mysqli_num_rows($macaddr_check) > 0){
            $sql_level = "SELECT level FROM tbJaringan WHERE macAddress LIKE '$macAddress'";
            $level_check = mysqli_query($conn, $sql_level);
            $level_check_fetch = mysqli_fetch_array($level_check);
            if($level >= $level_check_fetch[0]){
                $sql_register = "UPDATE tbJaringan SET level='$level',location='$location' WHERE macAddress LIKE '$macAddress'";
                if(mysqli_query($conn,$sql_register)){
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
            $sql_register = "INSERT INTO tbJaringan (macAddress,ssid,level,frequency,capability,location) VALUES ('$macAddress','$ssid','$level','$frequency','$capability','$location')";
            if(mysqli_query($conn,$sql_register)){
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
