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
    <title>Data Jadwal</title>
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
        .modern-button.btn-info { background: #3498db; color: white; }
        .modern-button.btn-danger { background: #e74c3c; color: white; }
        .modern-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .add-jadwal-btn {
            background: #27ae60;
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
</head>
<body>
<main class="modern-container">
    <div class="modern-card">
        <div class="modern-card-header">
            <h3 class="m-0">
                <i class="fas fa-calendar-alt mr-2"></i>
                Data Jadwal
            </h3>
            <a href="tambah_jadwal.php" class="add-jadwal-btn">
                <i class="fas fa-plus"></i>
                Tambah Jadwal
            </a>
        </div>
        <div class="table-responsive">
            <!-- Keeping the existing table structure -->
            <table class="modern-table" id="jadwalTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT jadwal.*, dokter.nama_dokter 
                             FROM jadwal 
                             JOIN dokter ON jadwal.id_dokter = dokter.id_dokter";
                    $result = mysqli_query($conn, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_dokter']; ?></td>
                        <td><?php echo $row['hari_praktek']; ?></td>
                        <td><?php echo $row['jam_mulai']; ?></td>
                        <td><?php echo $row['jam_selesai']; ?></td>
                        <td class="text-center">
                            <a href="edit_jadwal.php?id_jadwal=<?php echo $row['id_jadwal']?>" 
                               class="modern-button btn btn-info btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete_jadwal.php?id_jadwal=<?php echo $row['id_jadwal']?>" 
                               class="modern-button btn btn-danger btn-sm"
                               onclick="return confirm('Apakah anda yakin ingin menghapus jadwal ini?')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const table = document.getElementById('jadwalTable');
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
