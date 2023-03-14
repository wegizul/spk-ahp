<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah data Peta</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Kecamatan</label>
                                <input type="text" class="form-control" name="nama_kecamatan" required="" />
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" class="form-control" name="latitude" required="">
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control" name="lonfitude" required="">
                            </div>
                            <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
                            <a href="?page=peta" class="btn btn-danger">Tutup</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$id_kecamatan = $_POST['id_kecamatan'];
$nama_kecamatan = $_POST['nama_kecamatan'];
$latitude = $_POST['latitude'];
$lonfitude = $_POST['lonfitude'];
$Simpan = $_POST['Simpan'];

if ($Simpan) {
    $sql = $koneksi->query("insert into peta (id_kecamatan, nama_kecamatan, latitude, lonfitude) values ('$id_kecamatan','$nama_kecamatan','$latitude', '$lonfitude')");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href = "?page=peta";
        </script>
<?php
    }
}
?>