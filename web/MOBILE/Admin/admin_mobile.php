<?php
    require_once '../../conn.php';
    require_once 'fungsi.php';
    require('../../../vendor/autoload.php');
    $jar_err = "";
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if(empty($_POST['macaddress'])){
            $jar_err =  "Pilih data yang akan di hapus!"; 
        }else{
            $jar=$_POST['macaddress'];
            $jar=implode(",",$jar);
        }
        if(empty($jar_err)){
            if(deleteMultiTbl($jar)):
                echo'<div class="alert alert-danger">Data gagal dihapus!!</div>';
            else:
                echo'<div class="alert alert-success">Data berhasil dihapus!!</div>';
            endif;
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM PEMETAAN JARINGAN WIFI KANTOR BUPATI KABUPATEN BANGLI</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.semanticui.min.css">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin=""
    />
    <script
        src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""
    ></script>
    <link rel="stylesheet" href="stayle.css">
    <style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 100px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		}
	</style>

	<style>body { padding: 0; margin: 0; } #map { height: 100%; width: 100vw; }</style>
</head>
<body>
    <div class="container-fluid peta pt-5 pb-5 bg-light">
        <div class="container text-center">
            <h2 class=display-6>PETA</h2>
            <div>
                <div id="map" style="width: 1600px; height: 550px;"></div>
                <script>
                    var map = L.map('map').setView([-8.461381, 115.352084], 18);
                    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                        maxZoom: 22,
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1
                    }).addTo(map);
                    
                    var WIcon = L.icon({
                        iconUrl: '/gambar/wifi.png',
                        
                        iconSize:     [40, 40],
                    });

                    <?php
        
                        $show = pg_query($conn, "select * from tbjaringan");
                        while($result = pg_fetch_array($show)){ ?>

                        L.marker([<?php echo str_replace(['[', ']', 'location', '(', ')'], '', $result['location']); ?>], {icon: WIcon}).addTo(map).bindPopup(`<?php echo 'SSID :'.$result['ssid'].'<br>Frequency:'.$result['frequency']; ?>`)

                    <?php } ?>
                </script>
            </div>
        </div>
    </div>
    <div class="container-fluid jaringan pt-5 pb-5">
        <div class="container text-center">
            <h2 class=display-6>DATA JARINGAN</h2>
            <div>
            <div class="container">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <table id="example" class="ui celled table"> 
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>SSID</th>
                                <th>MAC Address</th>
                                <th>Level</th>
                                <th>Frequency</th>
                                <th>Jenis Sandi</th>
				<th>Terakhir Dipindai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $jaringan = selectTbl();
                            while($row = pg_fetch_array($jaringan)){
                                echo'
                                    <tr>
                                        <td><input type="checkbox" name="macaddress[]" value="'.$row['macaddress'].'"></td> 
                                        <td>'.$row['ssid'].'</td>
                                        <td>'.$row['macaddress'].'</td>
                                        <td>'.$row['level'].'</td>
                                        <td>'.$row['frequency'].'</td>
                                        <td>'.$row['capability'].'</td>
					<td>'.$row['date'].'</td>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                    </table> 
                    </div>
                        <script>
                            $(document).ready(function () {
                                $('#example').DataTable();
                            });
                        </script>
                    </div>
        </div>
        <br>
            <div class='container'>
                    <p>
                        Export Data Ke Excel:
                        <a href='run.php' target='_blank' type='button' class='btn btn-default'>
                            <img src='/gambar/xls.png' width='30' /> Export
                        </a>
                    </p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus</button> 
                    <span class="text-danger"><?php echo $jar_err; ?></span> 
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin manghapus data ini?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                Data akan di hapus secara permanen!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="proses">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </br>
    </div>
    </form>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
    ></script>
</body>
</html>
