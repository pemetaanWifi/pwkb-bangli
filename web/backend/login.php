<?php                                                                                                                               
require "../conn.php";
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $testi = "admin"
    $pass_H = md5($testi);
    if($conn){
        $sqlLogin = "SELECT * FROM tblogin WHERE username LIKE '$username' AND password LIKE '$password'";
        $loginQuery = pg_query($conn,$sqlLogin);
        
        $sqlupdate = "UPDATE tblogin SET password='21232f297a57a5a743894a0e4a801fc3' WHERE username LIKE 'admin'";
        $updateQuery = pg_query($conn,$sqlupdate);
        echo $pass_H;
        
        if(pg_num_rows($loginQuery) > 0){
            echo "Login Berhasil";
        }
        else{
            echo "Login Gagal";
        }      
    }
    else{
        echo "Connection Error";
    } 
?>
