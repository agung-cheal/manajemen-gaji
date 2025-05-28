<?php
include 'config/koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {
    $query = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id = $id");

    if ($query) {
        echo "<script>alert('Data berhasil dihapus✅'); window.location='karyawan.php';</script>";
    } else {
        // Menampilkan pesan kesalahan dari MySQL
        $error = mysqli_error($koneksi);
        echo "<script>alert('Gagal menghapus data: $error'); history.back();</script>";
    }
} else {
    echo "<script>alert('ID tidak valid'); history.back();</script>";
}
?>
