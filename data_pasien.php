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
    <title>Data Pasien</title>
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
        .add-pasien-btn {
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
                <i class="fas fa-users mr-2"></i>
                Data Pasien
            </h3>
            <a href="tambah_pasien.php" class="add-pasien-btn">
                <i class="fas fa-plus"></i>
                Tambah Pasien
            </a>
        </div>
        <div class="table-responsive">
            <table class="modern-table" id="pasienTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM pasien";
                    $result = mysqli_query($conn, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_pasien']; ?></td>
                        <td><?php echo $row['tanggal_lahir']; ?></td>
                        <td><?php echo $row['jenis_kelamin']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['telepon']; ?></td>
                        <td class="text-center">
                            <a href="edit_pasien.php?id_pasien=<?php echo $row['id_pasien']?>" 
                               class="modern-button btn btn-info btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete_pasien.php?id_pasien=<?php echo $row['id_pasien']?>" 
                               class="modern-button btn btn-danger btn-sm"
                               onclick="return confirm('Apakah anda yakin ingin menghapus data pasien ini?')">
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
        const table = document.getElementById('pasienTable');
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
