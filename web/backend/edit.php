<?php
    require "../conn.php";
    if($conn == true){
//       $sql_register = "UPDATE tbjaringan SET frequency='5' WHERE frequency LIKE '5GHz'";
        
//       $sql_register = "UPDATE tbjaringan SET frequency='5' WHERE frequency LIKE '5GHz'";
      $jaringan = pg_query($conn, "select date from tbjaringan");
      while($row = pg_fetch_array($jaringan)){
          $default_dt = $row['date'];
          echo "12Hour: ". $default_dt. "<br>";
//       if(pg_query($conn,$sql_register)){
//           echo "Data diperbarui";
//       }else{
//           echo "Gagal memperbarui data";
//       }
    }
    else{
        echo "Connection Error";
    }
?>
