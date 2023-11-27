<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM kas_masuk WHERE id_km='$id'");
if ($query) {
    echo '<script>alert("Data Berhasil di Hapus");location.href="?page=kas-masuk";</script>';
}
