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
                $mysqli = mysqli_connect('localhost', 'root', '', 'id19028635_dbpercobaan');
                $jaringan = mysqli_query($mysqli, "select * from tbjaringan");
                while($row = mysqli_fetch_array($jaringan))
                {
                    echo'<tr>
                    <td>'.$row['macAddress'].'</td>
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