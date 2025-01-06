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
    <title>Data Pasien</title>
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
        background: #FFEF00;
        border: 1px solid black;
        }
		table, th, td {
		border: 1px solid black !important;
		border-collapse: collapse;
		}
	</style>
</head>
<main>
	<div class="data">
		<table class="table table-bordered";>
			<thead>
			  <tr class="table_title">
			  	<th>No</th>
				<th>Nama Pasien</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Jam Selesai</th>
				<th>Telepon</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			  $query = "SELECT * FROM pasien";
			  $result_pasien = mysqli_query($conn, $query);
			  $no = 1;
			  while($row = mysqli_fetch_assoc($result_pasien)) { ?>
			  <tr>
			  	<td><?php echo $no++; ?></td>
				<td><?php echo $row['nama_dokter']; ?></td>
				<td><?php echo $row['tanggal_lahir']; ?></td>
				<td><?php echo $row['jenis_kelamin']; ?></td>
				<td><?php echo $row['email']; ?></td>
				td><?php echo $row['alamat']; ?></td>
				<td><?php echo $row['telepon']; ?></td>
				<td style="text-align: center";>
					<a href="edit_pasien.php?id_pasien=<?php echo $row['id_pasien']?>" class="btn btn-secondary">
                        <i class="fas fa-marker"></i>
                    </a>
				  	<a href="delete_pasien.php?id_pasien=<?php echo $row['id_pasien']?>" class="btn btn-danger" onclick="return confirm('yakin mau hapus?')">
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
