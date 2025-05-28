<?php include 'config/koneksi.php'; ?>

<?php

$id = $_GET['id'];


$query = mysqli_query($koneksi, "SELECT * FROM gaji WHERE id = $id");
$data = mysqli_fetch_assoc($query);


$karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan");
$jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Gaji Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Gaji Karyawan</h2>

    <form method="POST" action="proses_edit_gaji.php">
  
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

      
        <div class="mb-3">
            <label for="id_karyawan" class="form-label">Karyawan</label>
            <select name="id_karyawan" class="form-control" required>
                <option value="">-- Pilih Karyawan --</option>
                <?php while ($row = mysqli_fetch_assoc($karyawan)) { ?>
                    <option value="<?= $row['id'] ?>" <?= $data['id_karyawan'] == $row['id'] ? 'selected' : '' ?>><?= $row['nama'] ?></option>
                <?php } ?>
            </select>
        </div>

     
        <div class="mb-3">
            <label for="id_jabatan" class="form-label">Jabatan</label>
            <select name="id_jabatan" class="form-control" required>
                <option value="">-- Pilih Jabatan --</option>
                <?php while ($row = mysqli_fetch_assoc($jabatan)) { ?>
                    <option value="<?= $row['id'] ?>" <?= $data['id_jabatan'] == $row['id'] ? 'selected' : '' ?>><?= $row['nama_jabatan'] ?></option>
                <?php } ?>
            </select>
        </div>

     
        <div class="mb-3">
            <label for="periode_gaji" class="form-label">Periode Gaji</label>
            <input type="text" name="periode_gaji" class="form-control" value="<?= $data['periode_gaji'] ?>" required>
        </div>

       
        <div class="mb-3">
            <label for="bonus" class="form-label">Bonus</label>
            <input type="number" name="bonus" class="form-control" value="<?= $data['bonus'] ?>" required>
        </div>

    
        <div class="mb-3">
            <label for="tunjangan" class="form-label">Tunjangan</label>
            <input type="number" name="tunjangan" class="form-control" value="<?= $data['tunjangan'] ?>" required>
        </div>

      
        <div class="mb-3">
            <label for="jam_lembur" class="form-label">Jam Lembur</label>
            <input type="number" name="jam_lembur" class="form-control" value="<?= $data['jam_lembur'] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan gaji</button>
            <a href="gaji.php" class="btn btn-secondary">Kembali</a>
        </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
