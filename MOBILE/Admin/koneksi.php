<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'sql6501749');
$conn = new mysqli(HOST, USER, PASS, DB);
if($conn==false):
    die("gagal melakukan koneksi :" .$conn->connect_error());
endif;
?>
