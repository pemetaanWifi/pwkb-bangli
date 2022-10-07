<?php
    require "../conn.php";
    if($conn == true){
//       $sql_register = "UPDATE tbjaringan SET frequency='5' WHERE frequency LIKE '5GHz'";
        
//       $sql_register = "UPDATE tbjaringan SET frequency='5' WHERE frequency LIKE '5GHz'";
      $jaringan = pg_query($conn, "select date from tbjaringan");
      while($row = pg_fetch_array($jaringan)){
          $default_dt = $row['date'];
          $dt = date("Y-m-d h:i:s", strtotime($row['date']));
          if (str_contains($default_dt, 'pm')){
              $dt = date("Y-m-d h:i:s", strtotime($row['date'])+43200);
              echo "12Hour: ". $default_dt. "  ||  24Hour: ". $dt. "<br>";
          }
          else{
            echo "12Hour: ". $default_dt. "  ||  24Hour: ". $dt. "<br>";
          }
        }
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
