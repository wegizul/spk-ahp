<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<style>
    #mapid {
        height: 400px;
    }

    #map {
        height: 100%;
    }

    /* 
 * Optional: Makes the sample page fill the window. 
 */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .custom-map-control-button {
        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        margin: 10px;
        padding: 0 0.5em;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
        height: 40px;
        cursor: pointer;
    }

    .custom-map-control-button:hover {
        background: rgb(235, 235, 235);
    }
</style>

<!-- Advanced Tables -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                include "config.php";
                $pilih = mysqli_query($koneksi, "SELECT * FROM peta");
                $no = 1;
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Visualisasi Data Peta</h3>
                    </div>
                    <div class="card-body">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div id="map"></div>
                                    <!-- <div id="mapid"></div> -->
                                </div>
                                <div class="col-md-4">
                                    <form action="index.php?page=visualisasi" method="POST">
                                        <div class="form-group">
                                            <label for="">Nama Proyek Pembangunan Daerah</label>
                                            <input type="text" required name="pembangunan" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Kecamatan</label>
                                            <select name="id_kec" id="" required class="form-control">
                                                <option value="">Pilih</option>
                                                <?php while ($data = mysqli_fetch_assoc($pilih)) { ?>
                                                    <option value="<?= $data['id_kecamatan'] ?>"><?= $data['nama_kecamatan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nilai Perangkingan</label>
                                            <input type="text" required name="nilai" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>
                                    <div class="card-body">
                                        <?php
                                        !$query1 = mysqli_query($koneksi, "SELECT * FROM peta WHERE id_kecamatan = '$_POST[id_kec]'");
                                        while ($data1 = mysqli_fetch_assoc($query1)) {
                                        ?>
                                            <p>Proyek Pembangunan Daerah :<?= $_POST['pembangunan'] ?></p>
                                            <p>Kecamatan : <?= $data1['nama_kecamatan'] ?></p>
                                            <p>Nilai : <?= $_POST['nilai'] ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>

<script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you.
    let map, infoWindow;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: <?= $data1['latitude'] ?>,
                lng: <?= $data1['lonfitude'] ?>
            },
            zoom: 15,
        });
        infoWindow = new google.maps.InfoWindow();

        const locationButton = document.createElement("button");

        locationButton.textContent = "Pan to Current Location";
        locationButton.classList.add("custom-map-control-button");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
        locationButton.addEventListener("click", () => {
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        infoWindow.setPosition(pos);
                        infoWindow.setContent("Location found.");
                        infoWindow.open(map);
                        map.setCenter(pos);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        });
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
            browserHasGeolocation ?
            "Error: The Geolocation service failed." :
            "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
    }

    window.initMap = initMap;
    // var mymap = L.map('mapid').setView([<?= $data1['latitude'] ?>, <?= $data1['lonfitude'] ?>], 13);
    // L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZWdvdmFmbGF2aWEiLCJhIjoiY2ttMWdqNWZuMWhiNDJ1cWU5dHI1bWkxMCJ9.OUrt1MtkrK088C-WlI8SDA', {
    //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    //     maxZoom: 18,
    //     id: 'mapbox/streets-v11',
    //     tileSize: 512,
    //     zoomOffset: -1,
    // }).addTo(mymap);
    // var marker = L.marker([<?= $data1['latitude'] ?>, <?= $data1['lonfitude'] ?>]).addTo(mymap);
    // var popup = L.popup();

    // function onMapClick(e) {
    //     popup
    //         .setLatLng(e.latlng)
    //         .setContent("<?= $data1['nama_kecamatan'] ?>")
    //         .openOn(mymap);
    // }

    // mymap.on('click', onMapClick);
</script>
<?php } ?>