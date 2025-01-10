<?php
session_start();
include("koneksi.php");
include('header_footer.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .modern-container {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .modern-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .modern-card-header {
            background: #2c3e50;
            color: white;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .modern-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }
        .modern-table th {
            background: #f8f9fa;
            color: #2c3e50;
            padding: 1rem;
            font-weight: 600;
        }
        .modern-table td {
            padding: 1rem;
            border-bottom: 1px solid #eee;
        }
        .modern-table tr:hover {
            background: #f8f9fa;
        }
        .modern-button {
            padding: 0.5rem 1rem;
            border-radius: 5px;
            margin: 0 0.2rem;
            transition: all 0.3s ease;
        }
        .modern-button.btn-secondary {
            background: #3498db;
            color: white;
        }
        .modern-button.btn-danger {
            background: #e74c3c;
            color: white;
        }
        .modern-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .add-registration-btn {
            background: #27ae60;
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        .pesan {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>
<main class="modern-container">
    <div class="modern-card">
        <div class="modern-card-header">
            <h3 class="m-0">
                <i class="fas fa-clipboard-list mr-2"></i>
                Data Pendaftaran
            </h3>
            <a href="tambah_pendaftaran.php" class="add-registration-btn">
                <i class="fas fa-plus"></i>
                Tambah Pendaftaran
            </a>
        </div>
        <div class="table-responsive">
            <table class="modern-table" id="pendaftaranTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Nama Dokter</th>
                        <th>Tanggal Daftar</th>
                        <th>Keluhan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT pendaftaran.*, pasien.nama_pasien, dokter.nama_dokter, dokter.spesialisasi
                    FROM pendaftaran 
                    JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien 
                    JOIN dokter ON pendaftaran.id_dokter = dokter.id_dokter";
                    $result_all = mysqli_query($conn, $query);
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_all)) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_pasien']; ?></td>
                        <td><?php echo $row['nama_dokter']." - ".$row['spesialisasi']; ?></td>
                        <td><?php echo $row['tanggal_daftar']; ?></td>
                        <td><?php echo $row['keluhan']; ?></td>
                        <td class="text-center">
                            <a href="edit_pendaftaran.php?id_pendaftaran=<?php echo $row['id_pendaftaran']?>" 
                               class="modern-button btn-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete_pendaftaran.php?id_pendaftaran=<?php echo $row['id_pendaftaran']?>" 
                               class="modern-button btn-danger"
                               onclick="return confirm('Yakin mau hapus?')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="pesan">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const table = document.getElementById('pendaftaranTable');
        const rows = table.getElementsByTagName('tr');
        
        for (let i = 0; i < rows.length; i++) {
            rows[i].addEventListener('mouseover', function() {
                this.style.transform = 'scale(1.01)';
                this.style.transition = 'all 0.2s ease';
            });
            
            rows[i].addEventListener('mouseout', function() {
                this.style.transform = 'scale(1)';
            });
        }
    });
</script>
</body>
</html>
