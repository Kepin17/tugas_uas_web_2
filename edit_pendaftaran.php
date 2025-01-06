<?php
session_start();
include("koneksi.php");

$nama_pasien = '';
$nama_dokter = '';
$tanggal_daftar = '';
$keluhan = '';

if (isset($_GET['id_pendaftaran'])) {
    $id_pendaftaran = mysqli_real_escape_string($conn, $_GET['id_pendaftaran']);

    $query = "SELECT pendaftaran.*, pasien.nama_pasien FROM pendaftaran 
              JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien 
              WHERE pendaftaran.id_pendaftaran = '$id_pendaftaran'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $nama_pasien = $row['nama_pasien'];
            $id_dokter = $row['id_dokter'];
            $tanggal_daftar = $row['tanggal_daftar'];
            $keluhan = $row['keluhan'];
        }
    } else {
        die("Query failed: " . mysqli_error($conn));
    }
}

if (isset($_POST['update'])) {
    $id_dokter = mysqli_real_escape_string($conn, $_POST['id_dokter']);
    $keluhan = mysqli_real_escape_string($conn, $_POST['keluhan']);

    $query = "UPDATE pendaftaran SET 
                id_dokter='$id_dokter', 
                keluhan='$keluhan'
              WHERE id_pendaftaran='$id_pendaftaran'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = 'Data berhasil dirubah';
        $_SESSION['message_type'] = 'primary';

        header('Location: data_pendaftaran.php');
    } else {
      
        die("Update failed: " . mysqli_error($conn));
    }
}

include('header_footer.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Edit Pendaftaran</title>
    <style>
        .container {
            position: absolute-center;
            margin-top: 0px;
        }
    </style>
</head>
<body>
<main>
<div class="container p-4">
  <div class="row">
    <div class="col-11 mx-auto">
      <div class="card card-body">
        <form action="edit_pendaftaran.php?id_pendaftaran=<?php echo $_GET['id_pendaftaran']; ?>" method="POST">
        <div class="form-group">
          <input name="nama_pasien" type="text" class="form-control" value="<?php echo $nama_pasien; ?>" readonly>
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
                    $selected = ($row['id_dokter'] == $id_dokter) ? 'selected' : '';
                    echo '<option value="'.$row['id_dokter'].'" '.$selected.'>'.$row['nama_dokter'].'</option>';
                  }
                  } else {
                    echo '<option value="">Kosong</option>';
                  }
                  $conn->close();
                  ?>
            </select>
          </div>
          <div class="form-group">
            <input name="tanggal_daftar" type="date" class="form-control" value="<?php echo $tanggal_daftar; ?>" readonly>
          </div>
          <div class="form-group">
            <input name="keluhan" type="text" class="form-control" value="<?php echo $keluhan; ?>" placeholder="Update keluhan">
          </div>
          <button class="btn btn-warning btn-block" name="update">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>
</div>
</main>
</body>
</html>