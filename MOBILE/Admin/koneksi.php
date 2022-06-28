<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'id19028635_dbpercobaan');
$conn = new mysqli(HOST, USER, PASS, DB);
if($conn==false):
    die("gagal melakukan koneksi :" .$conn->connect_error());
endif;
?>