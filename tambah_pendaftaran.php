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
        <form action="save_jadwal.php" method="POST">
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
          <label for="hari_praktek">Hari Praktek</label>
                <select name="hari_praktek" class="form-control" required>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
          </div>
            <div class="form-group">
                <input type="time" name="jam_mulai" class="form-control" placeholder="Jam Mulai" required>
            </div>
            <div class="form-group">
                <input type="time" name="jam_selesai" class="form-control" placeholder="Jam Selesai" required>
            </div>
            <input type="submit" name="save_jadwal" class="btn btn-primary btn-block" value="Simpan Jadwal">
        </form>
    </div>
</main>
