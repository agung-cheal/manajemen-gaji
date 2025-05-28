<?php
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['id'], $_POST['tarif'])) {
      
        $id = (int)$_POST['id'];
        $tarif = mysqli_real_escape_string($koneksi, $_POST['tarif']);

        $query = mysqli_query($koneksi, "UPDATE lembur SET tarif = '$tarif' WHERE id = $id");

        if ($query) {
            echo "<script>alert('Tarif lembur berhasil diperbarui✅'); window.location='lembur.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui tarif lembur: " . mysqli_error($koneksi) . "'); history.back();</script>";
        }
    } else {
        echo "<script>alert('Data tidak lengkap.'); history.back();</script>";
    }
}
?>
