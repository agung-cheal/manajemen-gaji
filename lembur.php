<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tarif Lembur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 80px;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        th, td {
            text-align: center;
            vertical-align: middle;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            table {
                font-size: 14px;
            }
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color:rgb(86, 167, 240);
            z-index: 1040;
            padding: 10px 20px;
            text-align: end;
            box-shadow: 0 -1px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Daftar Tarif Lembur</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Tarif (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "
                    SELECT lembur.*, jabatan.nama_jabatan 
                    FROM lembur 
                    JOIN jabatan ON lembur.id_jabatan = jabatan.id
                ");
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_jabatan'] ?></td>
                    <td>Rp <?= number_format($row['tarif'], 0, ',', '.') ?></td>
                    <td>
                        <div class="d-flex justify-content-center gap-1 flex-wrap">
                            <a href="edit_lembur.php?id=<?= $row['id'] ?>" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="hapus_lembur.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                            <a href="detail_lembur.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex flex-wrap gap-2 mb-3 mt-3 justify-content-center">
        <a href="index.php" class="btn btn-secondary btn-sm">← Kembali ke Dashboard</a>
        <a href="tambah_lembur.php" class="btn btn-info btn-sm">+ Tambah Tarif Lembur</a>
    </div>
</div>

<footer>
    <small>© 2025 Agung</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
