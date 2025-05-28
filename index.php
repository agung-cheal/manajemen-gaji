<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gaji Karyawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            min-height: 100vh;
        }
        .sidebar {
            background-color:rgb(86, 163, 240);
            color: black;
            padding: 20px;
            height: 100vh;
            position: fixed;
            width: 250px;
        }
        .sidebar a {
            color: black;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }
        .sidebar a:hover {
            background-color:rgb(251, 253, 254);
            border-radius: 5px;
        }
        .main-content {
            margin-left: 250px;
            padding: 30px;
            padding-bottom: 100px;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                display: block;
            }
            .main-content {
                margin-left: 0;
            }
            footer {
                width: 100% !important;
                margin-left: 0 !important;
            }
        }
        table {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        h1, h3 {
            text-align: center;
            margin-bottom: 20px;
        }
   
        footer {
            position: fixed;
            bottom: 0;
            width: calc(100% - 250px);
            margin-left: 250px;
            background-color:rgb(86, 167, 240);
            padding: 10px 0;
            text-align: center;
            box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
            z-index: 1040;
        }
        @media (max-width: 768px) {
            footer {
                position: relative;
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


    <div class="sidebar d-block d-md-block">
        <div>
            <a>
                <img src="image/logo_emyu.png" alt="Logo" width="80" class="me-2" style="margin-left: 3.5rem; margin-bottom: 1rem;"> <h3 style="font-size: 17px;">Sistem Manajemen Gaji</h3>
            </a>
        </div>
    <ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link <?= $current_page == 'index.php' ? 'active text-white bg-primary' : '' ?>" href="index.php">
            Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $current_page == 'karyawan.php' ? 'active text-white bg-primary' : '' ?>" href="karyawan.php">
            Daftar Karyawan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $current_page == 'jabatan.php' ? 'active text-white bg-primary' : '' ?>" href="jabatan.php">
            Daftar Jabatan
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $current_page == 'rating.php' ? 'active text-white bg-primary' : '' ?>" href="rating.php">
            Daftar Rating
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $current_page == 'lembur.php' ? 'active text-white bg-primary' : '' ?>" href="lembur.php">
           Tarif Lembur
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= $current_page == 'gaji.php' ? 'active text-white bg-primary' : '' ?>" href="gaji.php">
           Gaji Karyawan
        </a>
    </li>
</ul>

    </div>
    

    <div class="main-content">
        <div class="alert alert-success text-center bg-info" role="alert">
            <marquee behavior="scroll" direction="left">👋 <strong>Selamat datang!</strong> Kamu sedang mengakses web sistem manajemen gaji karyawan.</marquee>
        </div>

        <h1>SELAMAT DATANG DI PT Agung Praxeo</h1>
        <p class="text-center">Silahkan Lihat Daftar Karyawan Kami</p>

        <div class="row text-center mb-4">
            <div class="col-sm-12 col-md-4 mb-3">
                <div class="card text bg-info" style="font-size: 0.9rem;">
                    <div class="card-body py-2">
                        <h6 class="card-title mb-1">Total Karyawan</h6>
                        <p class="card-text fw-bold fs-5 m-0">
                            <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM karyawan")); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-3">
                <div class="card text-bg-info" style="font-size: 0.9rem;">
                    <div class="card-body py-2">
                        <h6 class="card-title mb-1">Total Jabatan</h6>
                        <p class="card-text fw-bold fs-5 m-0">
                            <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM jabatan")); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-3">
                <div class="card text-bg-info" style="font-size: 0.9rem;">
                    <div class="card-body py-2">
                        <h6 class="card-title mb-1 text-dark">Total Rating</h6>
                        <p class="card-text fw-bold fs-5 m-0 text-dark">
                            <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM rating")); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Karyawan Terbaru</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Nama</th>
                        <th>Divisi</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Jabatan</th>
                        <th>Rating</th>
                        <th>Create At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "
                        SELECT k.nama, k.divisi, k.umur, k.jenis_kelamin, k.status, 
                               j.nama_jabatan, r.nilai_rating, k.created_at
                        FROM karyawan k
                        LEFT JOIN jabatan j ON k.id_jabatan = j.id
                        LEFT JOIN rating r ON k.id_rating = r.id
                        ORDER BY k.created_at DESC
                        LIMIT 5
                    ");
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['divisi'] ?></td>
                        <td><?= $row['umur'] ?> Tahun</td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['nama_jabatan'] ?? '-' ?></td>
                        <td><?= $row['nilai_rating'] ?? '-' ?></td>
                        <td><?= $row['created_at'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <br>
        <?php
        $total_slot = 10;
        $terisi = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM karyawan"));
        $persen = ($terisi / $total_slot) * 100;
        ?>
        <div class="mb-3 mt-4">
            <label class="form-label">Progress Pengisian Data Karyawan</label>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?= $persen ?>%;" aria-valuenow="<?= $persen ?>" aria-valuemin="0" aria-valuemax="100"><?= round($persen) ?>%</div>
            </div>
        </div>

    </div>
    <footer>
        <small>© 2025 Agung</small>
    </footer>

</body>
</html>
