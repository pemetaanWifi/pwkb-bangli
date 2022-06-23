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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/TA2/gambar/logo.png" alt="logo kominfo">
            </a> 
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarText"
                aria-controls="navbarText"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-right" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#layanan">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#peta">Peta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#data">Data Jaringan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang Kami</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid banner">
        <div class="container text-center">
            <h4 class="display-6">Selamat Datang Di Website Kami</h4>
            <h3 class="display-5">Sistem Pemetaan Jaringan WI-FI Kantor Bupati Kabupaten Bangli</h3>
        </div>
    </div>
    <div class="container-fluid layanan pt-5 pb-5">
        <div class="container text-center">
            <h2 class=display-3 id=layanan>Layanan</h2>
            <p>Layanan adalah fitur apa saja yang tersedia pada web ini.</p>
            <div class="row pt-4">
                <div class="col-md-4">
                    <i class="fas fa-map fa-5x"></i>
                    <h3 class="mt-3">PETA</h3>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-database fa-5x"></i>
                    <h3 class="mt-3">DATA JARINGAN</h3>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-user fa-5x"></i>
                    <h3 class="mt-3">TENTANG KAMI</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid peta pt-5 pb-5 bg-light">
        <div class="container text-center">
            <h2 class=display-3 id=peta>Peta</h2>
            <p>Peta berisi lokasi dimana wifi tersebut berada.</p>
            <div>
                <div id="map" style="width: 1600px; height: 600px;"></div>
                <script>
                    var map = L.map('map').setView([-8.461381, 115.352084], 25);
                    var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                        maxZoom: 18,
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1
                    }).addTo(map);
                    
                    var WIcon = L.icon({
                        iconUrl: '/TA2/gambar/wifi.png',
                        
                        iconSize:     [40, 40],
                    });

                    <?php
        
                        $mysqli = mysqli_connect('localhost', 'id19028635_percobaan', 'FHveRI6j(kkcL~PK', 'id19028635_dbpercobaan');
                        $show = mysqli_query($mysqli, "select * from jaringan");
                        while($result = mysqli_fetch_array($show)){ ?>

                        L.marker([<?php echo str_replace(['[', ']', 'lokasi', '(', ')'], '', $result['lokasi']); ?>], {icon: WIcon}).addTo(map).bindPopup(`<?php echo 'SSID :'.$result['ssid'].'<br>SPEED:'.$result['kecepatan']; ?>`)

                    <?php } ?>
                </script>
            </div>
        </div>
    </div>
    <div class="container-fluid jaringan pt-5 pb-5">
        <div class="container text-center">
            <h2 class=display-3 id=data>Data Jaringan</h2>
            <p>Data jaringan berisi informasi lebih detail tentang wifi yang tersedia.</p>
            <div>
            <div class="container">
                    <table id="example" class="ui celled table"> 
                        <thead>
                            <tr>
                                <th>SSID</th>
                                <th>MAC ADDRESS</th>
                                <th>IP ADDRESS</th>
                                <th>FREKUENSI</th>
                                <th>KECEPATAN</th>
                                <th>LEVEL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $mysqli = mysqli_connect('localhost', 'id19028635_percobaan', 'FHveRI6j(kkcL~PK', 'id19028635_dbpercobaan');
                            $jaringan = mysqli_query($mysqli, "select * from jaringan");
                            while($row = mysqli_fetch_array($jaringan))
                            {
                                echo"<tr>
                                <td>".$row['ssid']."</td>
                                <td>".$row['mac_add']."</td>
                                <td>".$row['ip_add']."</td>
                                <td>".$row['frekuensi']."</td>
                                <td>".$row['kecepatan']."</td>
                                <td>".$row['level']."</td>
                                </tr>";
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
    </div>
    <div class="container-fluid tentang pt-5 pb-5 bg-light">
        <div class="container text-center">
            <h2 class=display-3 id=tentang>Tentang Kami</h2>
            <p>Tentang kami berisi informasi siapa saja yang terlibat dalam mengembangkan website ini.</p>
            <div class="row pt-4 gx-4 gy-4">
                <div class="col-md-3 text-center tim">
                    <img src="https://www.kindpng.com/picc/m/24-248729_stockvader-predicted-adig-user-profile-image-png-transparent.png"
                    class="rounded-circle mb-3"
                    />
                    <h4>I Putu Geodita Jasika</h4>
                    <p>180010017</p>
                    <p>Sistem Komputer</p>
                </div>
                <div class="col-md-3 text-center tim">
                    <img src="https://www.kindpng.com/picc/m/24-248729_stockvader-predicted-adig-user-profile-image-png-transparent.png"
                    class="rounded-circle mb-3"
                    />
                    <h4>I Wayan Gde Wahyu Eka Pratama</h4>
                    <p>180010155</p>
                    <p>Sistem Komputer</p>
                </div>
                <div class="col-md-3 text-center tim">
                    <img src="https://www.kindpng.com/picc/m/24-248729_stockvader-predicted-adig-user-profile-image-png-transparent.png"
                    class="rounded-circle mb-3"
                    />
                    <h4>YOHANES PRIYO ATMOJO, S.Kom., M.Eng</h4>
                    <p>Pembimbing I</p>
                </div>
                <div class="col-md-3 text-center tim">
                    <img src="https://www.kindpng.com/picc/m/24-248729_stockvader-predicted-adig-user-profile-image-png-transparent.png"
                    class="rounded-circle mb-3"
                    />
                    <h4>GEDE HERDIAN SETIAWAN, S.Kom., M.T.</h4>
                    <p>Pembimbing II</p>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
    ></script>
</body>
</html>