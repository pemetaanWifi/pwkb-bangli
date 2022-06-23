<?php                                                                                                                               require "conn.php";
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    if($conn){
        $sqlLogin = "SELECT * FROM tbLogin WHERE username LIKE '$username' AND password LIKE '$password'";
        $loginQuery = mysqli_query($conn,$sqlLogin);
        if(mysqli_num_rows($loginQuery) > 0){
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