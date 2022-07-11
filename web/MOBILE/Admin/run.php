<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    require_once '../../koneksi.php';
?>
<!DOCTYPE html>
<head>
</head>
<body> 
    <table border='1'>
        <thead>
            <tr style='height:30px;vertical-align:middle;text-align:center;font-size:16px'>
                <th>MAC Address</th>
                <th>SSID</th>
                <th>Level</th>
                <th>Frequency</th>
                <th>Jenis Sandi</th>
                <th>Terakhir Dipindai</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $jaringan = pg_query($conn, "select * from tbjaringan");
                while($row = pg_fetch_array($jaringan))
                {
                    echo'<tr>
                    <td>'.$row['macaddress'].'</td>
                    <td>'.$row['ssid'].'</td>
                    <td>'.$row['level'].'</td>
                    <td>'.$row['frequency'].'</td>
                    <td>'.$row['capability'].'</td>
                    <td>'.$row['date'].'</td>
                    </tr>';
                }
                
            ?>   
        </tbody>
    </table>
</body>
</html>
