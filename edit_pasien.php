<?php
session_start();
include("koneksi.php");

$nama_pasien = '';
$tanggal_lahir = '';
$jenis_kelamin = '';
$email = '';
$alamat = '';
$jam_selesai = '';

if (isset($_GET['id_pasien'])) {
    $id_pasien = mysqli_real_escape_string($conn, $_GET['id_pasien']);

    $query = "SELECT * FROM pasien WHERE id_pasien='$id_pasien'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            $nama_pasien = $row['nama_pasien'];
            $tanggal_lahir = $row['tanggal_lahir'];
            $jenis_kelamin = $row['jenis_kelamin'];
            $email = $row['email'];
            $alamat = $row['alamat'];
            $jam_selesai = $row['jam_selesai'];
        }
    } else {
        die("Query failed: " . mysqli_error($conn));
    }
}

if (isset($_POST['update'])) {
    $nama_pasien = mysqli_real_escape_string($conn, $_POST['nama_pasien']);
    $tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $jam_selesai = mysqli_real_escape_string($conn, $_POST['jam_selesai']);

    $query = "UPDATE pasien SET 
                nama_pasien='$nama_pasien', 
                tanggal_lahir='$tanggal_lahir', 
                jenis_kelamin='$jenis_kelamin', 
                email='$email',
                alamat='$alamat', 
                jam_selesai='$jam_selesai'
              WHERE id_pasien='$id_pasien'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = 'Data berhasil dirubah';
        $_SESSION['message_type'] = 'primary';

        header('Location: data_pasien.php');
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
    <title>Edit Pasien</title>
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
        <form action="edit_pasien.php?id_pasien=<?php echo $_GET['id_pasien']; ?>" method="POST">
        <div class="form-group">
            <input name="nama_pasien" type="text" class="form-control" value="<?php echo $nama_pasien; ?>" placeholder="Update nama pasien">
          </div>
          <div class="form-group">
            <input name="tanggal_lahir" type="text" class="form-control" value="<?php echo $tanggal_lahir; ?>" placeholder="Update tanggal lahir">
          </div>
          <div class="form-group">
          <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="L">Laki laki</option>
                    <option value="P">Perempuan</option>
                </select>
          </div>
          <div class="form-group">
            <input name="email" type="email" class="form-control" value="<?php echo $email; ?>" placeholder="Update email">
          </div>
          <div class="form-group">
            <input name="alamat" type="text" class="form-control" value="<?php echo $alamat; ?>" placeholder="Update alamat">
          </div>
          <div class="form-group">
            <input name="jam_selesai" type="text" class="form-control" value="<?php echo $jam_selesai; ?>" placeholder="Update jam selesai">
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