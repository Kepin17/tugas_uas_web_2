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
    <title>Data Pendaftaran</title>
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
        background: #64FF64;
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
				<th>Nama Pendaftaran</th>
				<th>Jenis Pendaftaran</th>
				<th>Telepon Pendaftaran</th>
				<th>Alamat Pendaftaran</th>
				<th>Edit</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			  $query = "SELECT * FROM Pendaftaran";
			  $result_Pendaftaran = mysqli_query($conn, $query);
			  $no = 1;
			  while($row = mysqli_fetch_assoc($result_Pendaftaran)) { ?>
			  <tr>
			  	<td><?php echo $no++; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['jenis']; ?></td>
				<td><?php echo $row['telepon']; ?></td>
				<td><?php echo $row['alamat']; ?></td>
				<td style="text-align: center";>
					<a href="edit_Pendaftaran.php?ids=<?php echo $row['ids']?>" class="btn btn-secondary">
                        <i class="fas fa-marker"></i>
                    </a>
				  	<a href="delete_Pendaftaran.php?ids=<?php echo $row['ids']?>" class="btn btn-danger" onclick="return confirm('yakin mau hapus?')">
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
