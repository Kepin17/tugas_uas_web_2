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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Data Admin</title>
    <style>
        .container-fluid {
            padding: 2rem;
            background: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            background: white;
            padding: 20px;
            margin-bottom: 20px;
        }
        .table {
            margin-top: 15px;
            background: white;
        }
        .table thead th {
            background: #007bff;
            color: white;
            border: none;
            padding: 15px;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
            transition: all 0.3s;
        }
        .btn {
            margin: 2px;
            border-radius: 8px;
            transition: transform 0.2s;
        }
        .btn:hover {
            transform: scale(1.1);
        }
        .pesan {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            animation: slideIn 0.5s ease-in-out;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }
        .page-title {
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .action-buttons {
            white-space: nowrap;
        }
    </style>
</head>
<body>
<main>
    <div class="container-fluid">
        <div class="card">
            <h2 class="page-title">
                <i class="fas fa-users-cog mr-2"></i>
                Data Admin
            </h2>
            <div class="table-responsive">
                <table class="table" id="adminTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Admin</th>
                            <th>Email Admin</th>
                            <th>Alamat Admin</th>
                            <th>Telepon Admin</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM admin";
                        $result_admin = mysqli_query($conn, $query);
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result_admin)) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['nama_admin']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['telepon']; ?></td>
                            <td class="action-buttons" style="text-align: center";>
                                <a href="edit_admin.php?id_admin=<?php echo $row['id_admin']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_admin.php?id_admin=<?php echo $row['id_admin']?>" class="btn btn-danger" onclick="return confirm('yakin mau hapus?')">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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
</body>
</html>
