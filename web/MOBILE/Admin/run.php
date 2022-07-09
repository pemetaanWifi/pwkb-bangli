<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
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
            </tr>
        </thead>
        <tbody>
            <?php
                $mysqli = pg_connect("host=ec2-54-227-248-71.compute-1.amazonaws.com port=5432 dbname=d13gbsqvfk72d4 user=tqzwwxdkhvujwb password=0125b49d9b9c0297b96c86cc66b606951c7b6b8aba427a169150c493bb0d7344");
                $jaringan = pg_query($mysqli, "select * from tbjaringan");
                while($row = pg_fetch_array($jaringan))
                {
                    echo'<tr>
                    <td>'.$row['macaddress'].'</td>
                    <td>'.$row['ssid'].'</td>
                    <td>'.$row['level'].'</td>
                    <td>'.$row['frequency'].'</td>
                    <td>'.$row['capability'].'</td>
                    </tr>';
                }
                
            ?>   
        </tbody>
    </table>
</body>
</html>
