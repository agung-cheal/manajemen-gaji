<?php include 'config/koneksi.php'; 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Karyawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 8%;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }

   
        .btn-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

       
        @media (max-width: 768px) {
            table {
                display: none;
            }
            .card-karyawan {
                margin-bottom: 15px;
            }
            .card-karyawan .card-body p {
                margin: 2px 0;
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
    <h2 class="text-center mb-4">Daftar Karyawan</h2>


    <div class="table-responsive d-none d-md-block">
        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Alamat</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Jabatan</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "
                    SELECT k.*, j.nama_jabatan, r.nilai_rating 
                    FROM karyawan k
                    LEFT JOIN jabatan j ON k.id_jabatan = j.id
                    LEFT JOIN rating r ON k.id_rating = r.id
                ");
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['divisi'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['umur'] ?> Tahun</td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['nama_jabatan'] ?? '-' ?></td>
                    <td><?= $row['nilai_rating'] ?? '-' ?></td>
                    <td>
                        <div class="d-flex justify-content-center gap-1 flex-wrap">
                            <a href="edit_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="hapus_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                            <a href="detail_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

   
    <div class="d-md-none">
        <?php
        mysqli_data_seek($query, 0); 
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <div class="card card-karyawan shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><?= $no++ . '. ' . $row['nama'] ?></h5>
                <p><strong>Divisi:</strong> <?= $row['divisi'] ?></p>
                <p><strong>Alamat:</strong> <?= $row['alamat'] ?></p>
                <p><strong>Umur:</strong> <?= $row['umur'] ?> Tahun</p>
                <p><strong>Jenis Kelamin:</strong> <?= $row['jenis_kelamin'] ?></p>
                <p><strong>Status:</strong> <?= $row['status'] ?></p>
                <p><strong>Jabatan:</strong> <?= $row['nama_jabatan'] ?? '-' ?></p>
                <p><strong>Rating:</strong> <?= $row['nilai_rating'] ?? '-' ?></p>
                <div class="d-flex justify-content-center gap-2 mt-2 flex-wrap">
                    <a href="edit_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-secondary btn-sm">Edit</a>
                    <a href="hapus_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    <a href="detail_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="btn-container">
        <a href="index.php" class="btn btn-secondary btn-sm">← Kembali ke Dashboard</a>
        <a href="tambah_karyawan.php" class="btn btn-info btn-sm">+ Tambah Karyawan</a>
    </div>
</div>

<footer>
    <small>©2025 Agung</small>
</footer>

</body>
</html>
