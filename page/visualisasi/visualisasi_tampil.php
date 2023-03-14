<?php
include "config.php";

if (isset($_POST['submit'])) {
    $nama_kecamatan = $_POST['nama_kecamatan'];
    $nilai = $_POST['nilai'];

    $sql = $koneksi->query("SELECT * FROM peta WHERE nama_kecamatan='$nama_kecamatan' ");

    while ($r = mysqli_fetch_array($sql)) {
?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Visualisai Hasil Perankingan</h3>
                            </div>
                            <div class="card-body">
                                <div id="mapid" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <th>Nama Kecamatan</th>
                                            <th>:</th>
                                            <th><?php echo $r['nama_kecamatan']; ?></th>
                                        </tr>
                                        <tr>
                                            <th>Nilai Perangkingan</th>
                                            <th>:</th>
                                            <th><?php echo $_POST['nilai'] ?></th>
                                        </tr>
                                        <tr>
                                            <th>Nama Proyek Pembangunan Daerah</th>
                                            <th>:</th>
                                            <th><?php echo $_POST['proyek'] ?></th>
                                        </tr>
                                    </table>
                                    <a href="?page=visualisasi" class="btn btn-success btn-sm mt-3" style="float: right;">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            let map: google.maps.Map, infoWindow: google.maps.InfoWindow;

            function initMap(): void {
                map = new google.maps.Map(document.getElementById("map") as HTMLElement, {
                    center: {
                        lat: -34.397,
                        lng: 150.644
                    },
                    zoom: 6,
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
                            (position: GeolocationPosition) => {
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
                                handleLocationError(true, infoWindow, map.getCenter() !);
                            }
                        );
                    } else {
                        // Browser doesn't support Geolocation
                        handleLocationError(false, infoWindow, map.getCenter() !);
                    }
                });
            }

            function handleLocationError(
                browserHasGeolocation: boolean,
                infoWindow: google.maps.InfoWindow,
                pos: google.maps.LatLng
            ) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(
                    browserHasGeolocation ?
                    "Error: The Geolocation service failed." :
                    "Error: Your browser doesn't support geolocation."
                );
                infoWindow.open(map);
            }

            declare global {
                interface Window {
                    initMap: () => void;
                }
            }
            window.initMap = initMap;
            // var mymap = L.map('mapid').setView([-0.9470831999999999, 100.41718100000003], 12);

            // L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            //         '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            //         'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            //     id: 'mapbox/streets-v11'
            // }).addTo(mymap);

            // var marker = L.marker([<?php echo $r['latitude']; ?>, <?php echo $r['lonfitude']; ?>]).addTo(mymap).bindPopup("<center><b><?php echo $r['nama_kecamatan']; ?></b></center><br><?php echo $r['latitude'] . "," . $r['lonfitude']; ?>.").openPopup();
        </script>
<?php }
} ?>