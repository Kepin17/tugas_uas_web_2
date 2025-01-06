<?php
session_start();
include('header_footer.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pendaftaran</title>
    <style>
        .container {
            position: absolute-center;
            margin-top: 0px;
            width: 800px;
        }
    </style>
</head>
<main class="container">
    <div class="card card-body">
        <form action="save_pendaftaran.php" method="POST">
        <div class="form-group">
            <select name="id_pasien" class="form-control" required>
              <option value="">Pilih Pasien</option>
                <?php
                include 'koneksi.php';
                $sql = "SELECT id_pasien, nama_pasien FROM pasien";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row['id_pasien'].'">'.$row['nama_pasien'].'</option>';
                  }
                  } else {
                    echo '<option value="">Kosong</option>';
                  }
                  $conn->close();
                  ?>
            </select>
          </div>
          <div class="form-group">
            <select name="id_dokter" class="form-control" required>
              <option value="">Pilih Dokter</option>
                <?php
                include 'koneksi.php';
                $sql = "SELECT id_dokter, nama_dokter FROM dokter";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row['id_dokter'].'">'.$row['nama_dokter'].'</option>';
                  }
                  } else {
                    echo '<option value="">Kosong</option>';
                  }
                  $conn->close();
                  ?>
            </select>
          </div>
            <div class="form-group">
              <input type="date" name="tanggal_daftar" class="form-control" placeholder="Tanggal Daftar" required>
            </div>
            <div class="form-group">
                <input type="text" name="keluhan" class="form-control" placeholder="Keluhan" required>
            </div>
            <input type="submit" name="save_pendaftaran" class="btn btn-primary btn-block" value="Simpan Pendaftaran">
        </form>
    </div>
</main>
