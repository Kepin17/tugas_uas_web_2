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
    <title>Data Dokter</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<main class="modern-container">
    <div class="modern-card">
        <div class="modern-card-header">
            <h3 class="m-0">
                <i class="fas fa-user-md mr-2"></i>
                Data Dokter
            </h3>
        </div>
        <div class="table-responsive">
            <table class="modern-table" id="dokterTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM dokter";
                    $result = mysqli_query($conn, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_dokter']; ?></td>
                        <td><?php echo $row['spesialisasi']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['telepon']; ?></td>
                        <td class="text-center">
                            <a href="edit_dokter.php?id=<?php echo $row['id_dokter']?>" 
                               class="modern-button btn btn-info btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete_dokter.php?id=<?php echo $row['id_dokter']?>" 
                               class="modern-button btn btn-danger btn-sm"
                               onclick="return confirm('Apakah anda yakin ingin menghapus dokter ini?')">
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
</body>
</html>
