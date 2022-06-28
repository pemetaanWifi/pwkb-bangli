<?php
define('HOST', 'sql6.freesqldatabase.com');
define('USER', 'sql6501749');
define('PASS', '3LSA9zjYQi');
define('DB', 'sql6501749');
$conn = new mysqli(HOST, USER, PASS, DB);
if($conn==false):
    die("gagal melakukan koneksi :" .$conn->connect_error());
endif;
?>
