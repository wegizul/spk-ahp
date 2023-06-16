<?php
$kriteria = $koneksi->query("select * from perangkingan a join tb_kriteria b on a.rk_kriteria_id=b.kriteria_id group by b.kriteria_id");
// $alternatif = $koneksi->query("select * from perangkingan a join tb_kriteria b on a.rk_kriteria_id=b.kriteria_id group by a.rk_alternatif_nama");
$alternatif = $koneksi->query("select * from perangkingan group by rk_alternatif_nama");
?>
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<style type="text/css">
  .container {
    width: 100%;
    margin: 15px auto;
  }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

<body>
  <h3><b style="color: #555555">Dashboard</b></h3>
  <div class="card">

    <div class="container">
      <canvas id="myChart" width="100" height="50"></canvas>
    </div>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Drainase Desa Buluh Rampai', 'Pembuatan Box Cover Jalan Tanah Datar - Sibabat', 'Peningkatan Jalan dalam Kota Pematang Rebah ', 'Peningkatan Jalan dalam Kota Rengat', 'Peningkatan Kantor Gedung Inspektorat', 'Peningkatan Ruang Labor Komputer dan Perabotnya Smp 3 Seberida', 'Sarana Prasarana MTQ'],
          datasets: [{
            label: 'Total Nilai',
            data: [<?php while ($p = mysqli_fetch_array($alternatif)) {
                      echo '"' . $p['rk_nilai'] . '",';
                    } ?>],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    </script>

    <section class="content-header">
      <div class="row">
        <div class="col-lg-4 col-9">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $koneksi = mysqli_connect("localhost", "root", "", "bappeda_ahp");
              $sql = "SELECT * FROM tb_kriteria";

              if ($result = mysqli_query($koneksi, $sql)) {
                $rowcount = mysqli_num_rows($result);
                printf("<h3>%d \n", $rowcount);

                mysqli_free_result($result);
              }

              mysqli_close($koneksi);
              ?>
              <h5>Data Kriteria</h5>
            </div>
            <div class="icon">
            </div>
            <a href="?page=kriteria" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-9">
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              $koneksi = mysqli_connect("localhost", "root", "", "bappeda_ahp");
              $sql = "SELECT * FROM tb_pembangunan";

              if ($result = mysqli_query($koneksi, $sql)) {
                $rowcount = mysqli_num_rows($result);
                printf("<h3>%d \n", $rowcount);

                mysqli_free_result($result);
              }

              mysqli_close($koneksi);
              ?>
              <h5>Data Proyek Pembangunan</h5>
            </div>
            <div class="icon">
            </div>
            <a href="?page=pembangunan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-9">
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              $koneksi = mysqli_connect("localhost", "root", "", "bappeda_ahp");
              $sql = "SELECT * FROM peta";

              if ($result = mysqli_query($koneksi, $sql)) {
                $rowcount = mysqli_num_rows($result);
                printf("<h3>%d \n", $rowcount);

                mysqli_free_result($result);
              }

              mysqli_close($koneksi);
              ?>
              <h5>Data Peta</h5>
            </div>
            <div class="icon">
            </div>
            <a href="?page=peta" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
  </div>
</body>