<?php
include "config.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tb_pembangunan WHERE id_pembangunan='$id'");
echo "<script>alert('Data Berhasil Di Hapus');
			window.location='?page=pembangunan';
			</script>";
