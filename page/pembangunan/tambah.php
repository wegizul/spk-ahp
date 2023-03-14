<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Pembangunan</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Proyek Pembangunan</label>
                                <input type="text" class="form-control" name="nama_pembangunan" required="">
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control" name="nama_kecamatan" required="">
                            </div>
                            <input type="Submit" name="Simpan" value="Simpan" class="btn btn-success">
                            <a href="?page=pembangunan" class="btn btn-danger">Tutup</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    $id_pembangunan = $_POST['id_pembangunan'];
    $nama_pembangunan = $_POST['nama_pembangunan'];
    $nama_kecamatan = $_POST['nama_kecamatan'];
    $Simpan = $_POST['Simpan'];

    if ($Simpan) {
        $sql = $koneksi->query("insert into tb_pembangunan (id_pembangunan, nama_pembangunan,nama_kecamatan) values ('$id_pembangunan','$nama_pembangunan','$nama_kecamatan')");
        if ($sql) {
    ?>
            <script type="text/javascript">
                alert("Data Berhasil Disimpan");
                window.location.href = "?page=pembangunan";
            </script>
    <?php
        }
    }
    ?>