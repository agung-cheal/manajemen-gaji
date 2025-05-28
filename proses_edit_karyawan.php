<?php
include 'config/koneksi.php';

// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitasi dan ambil data dari POST
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $divisi = mysqli_real_escape_string($koneksi, $_POST['divisi']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $umur = (int)$_POST['umur'];
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    $id_jabatan = (int)$_POST['id_jabatan'];
    $id_rating = (int)$_POST['id_rating'];

    // Buat query update
    $query = "UPDATE karyawan SET 
                nama = '$nama',
                divisi = '$divisi',
                alamat = '$alamat',
                umur = $umur,
                jenis_kelamin = '$jenis_kelamin',
                status = '$status',
                id_jabatan = $id_jabatan,
                id_rating = $id_rating
              WHERE id = $id";

    // Eksekusi query
    $update = mysqli_query($koneksi, $query);

    if ($update) {
        echo "<script>
                alert('Data berhasil diperbarui✅');
                window.location.href = 'karyawan.php';
              </script>";
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
} else {
    echo "Akses tidak diizinkan.";
}
?>
</content>
</create_file>
