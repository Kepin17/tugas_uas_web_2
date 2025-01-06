<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mycss/bootstrap/bootstrap.min.css">
    <script src="mycss/jquery_min/jquery.min.js"></script>
    <script src="mycss/popper_min/popper.min.js"></script>
    <script src="mycss/bootstrap_min/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            padding-top: 80px;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            height: 60px;
            z-index: 1000;
            background-color:rgb(255, 255, 255);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .container-fluid {
            margin-top: 10px;
            flex: 1;
			z-index: 999;   
        }
        .main-content {
            padding: 20px;
            flex: 1;
        }
        footer {
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
			height: 50px;
            width: 100%;
			z-index: 1000;
			background-color: #ffffff;
			color:rgb(55, 0, 255);
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }


        .dropdown-item:hover {
            background-color: rgb(205, 237, 255);
            color: rgb(144, 163, 252);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="mr-3">
            <img src="gambar/rslogo.png" alt="Logo" style="width: 90px; height: 50px;">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a id="homeBtn" class="nav-link" href="index.php"  style="color:rgb(144, 163, 252);">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="AdminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: rgb(144, 163, 252);">
                    Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="AdminDropdown" style="background-color: #ffffff;">
                        <a class="dropdown-item" id="tambahAdminBtn" href="tambah_admin.php" style="color: rgb(144, 163, 252);">Tambah Admin</a>
                        <a class="dropdown-item" id="dataAdminBtn" href="data_admin.php" style="color: rgb(144, 163, 252);">Data Admin</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="DokterDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: rgb(144, 163, 252);">
                    Dokter
                    </a>
                    <div class="dropdown-menu" aria-labelledby="DokterDropdown" style="background-color: #ffffff;">
                        <a class="dropdown-item" id="tambahDokterBtn" href="tambah_dokter.php" style="color: rgb(144, 163, 252);">Tambah Dokter</a>
                        <a class="dropdown-item" id="dataDokterBtn" href="data_dokter.php" style="color: rgb(144, 163, 252);">Data Dokter</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="JadwalDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: rgb(144, 163, 252);">
                    Jadwal
                    </a>
                    <div class="dropdown-menu" aria-labelledby="JadwalDropdown" style="background-color: #ffffff;">
                        <a class="dropdown-item" id="tambahJadwalBtn" href="tambah_jadwal.php" style="color: rgb(144, 163, 252);">Tambah Jadwal</a>
                        <a class="dropdown-item" id="dataJadwalBtn" href="data_jadwal.php" style="color: rgb(144, 163, 252);">Data Jadwal</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="PasienDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: rgb(144, 163, 252);">
                    Pasien
                    </a>
                    <div class="dropdown-menu" aria-labelledby="PasienDropdown" style="background-color: #ffffff;">
                        <a class="dropdown-item" id="tambahPasienBtn" href="tambah_pasien.php" style="color: rgb(144, 163, 252);">Tambah Pasien</a>
                        <a class="dropdown-item" id="dataPasienBtn" href="data_pasien.php" style="color: rgb(144, 163, 252);">Data Pasien</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="PendaftaranDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: rgb(144, 163, 252);">
                    Pendaftaran
                    </a>
                    <div class="dropdown-menu" aria-labelledby="JadwalDropdown" style="background-color: #ffffff;">
                        <a class="dropdown-item" id="tambahPendaftaranBtn" href="tambah_pendaftaran.php" style="color: rgb(144, 163, 252);">Tambah Pendaftaran</a>
                        <a class="dropdown-item" id="dataPendaftaranBtn" href="data_pendaftaran.php" style="color: rgb(144, 163, 252);">Data Pendaftaran</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="main-content" id="mainContent">
        </div>
    </div>
    <footer>
        <p>~ Selalu Semangat dan Bersyukur - RS DuBa 2024 ~</p>
    </footer>
</body>
</html>
