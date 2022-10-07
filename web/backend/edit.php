<?php
    require "../conn.php";
    if($conn == true){
      $sql_register = "UPDATE tbjaringan SET frequency='2.4' WHERE frequency LIKE '2GHz'";
      if(pg_query($conn,$sql_register)){
          echo "Data diperbarui";
      }else{
          echo "Gagal memperbarui data";
      }
    }
    else{
        echo "Connection Error";
    }
?>
