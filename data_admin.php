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
    <title>Data Admin</title>
    <style>
        .pesan {
            position: absolute;
            top: 65px;
            right: 85px;
            z-index: 999;
            text-align: center;
        }
        .data {
            position: absolute;
			width: 1400px;
            margin-top: -10px;
			margin-left: 50px;
            z-index: 998;
        }
        .table_title {
            color: #000000;
            border: 1px solid black;
            text-align: center;
        }
        .table_title th {
            background: #00F2FF;
            border: 1px solid black;
        }
        table, th, td {
		    border: 1px solid black !important;
		    border-collapse: collapse;
		}
    </style>
</head>
<body>
<main>
    <div class="data">
        <table class="table table-bordered">
            <thead>
                <tr class="table_title">
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
                    <td style="text-align: center";>
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
