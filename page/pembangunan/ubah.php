<?php
include "config.php";
$pilih = mysqli_query($koneksi, "select * from tb_pembangunan WHERE id_pembangunan='$_GET[id]'");
while ($tampil = mysqli_fetch_array($pilih)) {
    $deskripsi = $tampil['deskripsi'];
?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Pembangunan</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>ID Pembangunan</label>
                                    <input class="form-control" name="id_pembangunan" value="<?php echo $tampil['id_pembangunan']; ?>" readonly />

                                    <div class="form-group">
                                        <label>Nama Proyek Pembangunan</label>
                                        <input type="text" class="form-control" name="nama_pembangunan" value="<?php echo $tampil['nama_pembangunan']; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="nama_kecamatan" value="<?php echo $tampil['nama_kecamatan']; ?>" />
                                    </div>

                                    <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
                                    <a href="?page=pembangunan" class="btn btn-danger">Tutup</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php

$id_pembangunan = $_POST['id_pembangunan'];
$nama_pembangunan = $_POST['nama_pembangunan'];
$nama_kecamatan = $_POST['nama_kecamatan'];
$Simpan = $_POST['Simpan'];

if ($Simpan) {
    $sql = $koneksi->query("UPDATE tb_pembangunan set nama_pembangunan='$nama_pembangunan',nama_kecamatan='$nama_kecamatan' where id_pembangunan ='$id_pembangunan'");
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil di Edit");
            window.location.href = "?page=pembangunan";
        </script>
<?php
    }
}
?>