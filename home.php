<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<body>
  <h3><b style="color: #555555">Dashboard</b></h3>
  <div class="card">
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
              <!-- <i class="ion "></i> -->
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
              <!-- <i class="ion "></i> -->
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
              <!-- <i class="ion ion-pie-graph"></i> -->
            </div>
            <a href="?page=peta" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
  </div>
</body>