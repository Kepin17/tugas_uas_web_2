<?php
session_start();
include("koneksi.php");

$nama_dokter = '';
$spesialisasi = '';
$email = '';
$alamat = '';
$telepon = '';
$status = '';

if (isset($_GET['id_dokter'])) {
    $id_dokter = mysqli_real_escape_string($conn, $_GET['id_dokter']);

    $query = "SELECT * FROM dokter WHERE id_dokter='$id_dokter'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            $nama_dokter = $row['nama_dokter'];
            $spesialisasi = $row['spesialisasi'];
            $email = $row['email'];
            $alamat = $row['alamat'];
            $telepon = $row['telepon'];
            $status = $row['status'];
        }
    } else {
        die("Query failed: " . mysqli_error($conn));
    }
}

if (isset($_POST['update'])) {
    $nama_dokter = mysqli_real_escape_string($conn, $_POST['nama_dokter']);
    $spesialisasi = mysqli_real_escape_string($conn, $_POST['spesialisasi']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE dokter SET 
                nama_dokter='$nama_dokter', 
                spesialisasi='$spesialisasi', 
                email='$email', 
                alamat='$alamat',
                telepon='$telepon', 
                status='$status'
              WHERE id_dokter='$id_dokter'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = 'Data berhasil dirubah';
        $_SESSION['message_type'] = 'primary';

        header('Location: data_dokter.php');
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
    <title>Edit Dokter</title>
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
        <form action="edit_dokter.php?id_dokter=<?php echo $_GET['id_dokter']; ?>" method="POST">
          <div class="form-group">
            <input name="nama_dokter" type="text" class="form-control" value="<?php echo $nama_dokter; ?>" placeholder="Update nama">
          </div>
          <div class="form-group">
            <input name="spesialisasi" type="text" class="form-control" value="<?php echo $spesialisasi; ?>" placeholder="Update spesialisasi">
          </div>
          <div class="form-group">
            <input name="email" type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Update email">
          </div>
          <div class="form-group">
            <input name="alamat" type="text" class="form-control" value="<?php echo $alamat; ?>" placeholder="Update alamat">
          </div>
          <div class="form-group">
            <input name="telepon" type="text" class="form-control" value="<?php echo $telepon; ?>" placeholder="Update telepon">
          </div>
          <div class="form-group">
          <label for="status">Status Dokter</label>
                <select name="status" class="form-control" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Non-Aktif">Non-Aktif</option>
                </select>
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