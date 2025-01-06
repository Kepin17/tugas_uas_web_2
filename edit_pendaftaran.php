<?php
session_start();
include("koneksi.php");

$nama = '';
$jenis = '';
$telepon = '';
$alamat = '';

if (isset($_GET['ids'])) {
    $ids = mysqli_real_escape_string($conn, $_GET['ids']);

    $query = "SELECT * FROM supplier WHERE ids='$ids'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            $nama = $row['nama'];
            $jenis = $row['jenis'];
            $telepon = $row['telepon'];
            $alamat = $row['alamat'];
        }
    } else {
        die("Query failed: " . mysqli_error($conn));
    }
}

if (isset($_POST['update'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $query = "UPDATE supplier SET 
                nama='$nama', 
                jenis='$jenis', 
                telepon='$telepon', 
                alamat='$alamat'
              WHERE ids='$ids'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = 'Data berhasil dirubah';
        $_SESSION['message_type'] = 'primary';

        header('Location: data_supplier.php');
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
        <form action="edit_supplier.php?ids=<?php echo $_GET['ids']; ?>" method="POST">
          <div class="form-group">
            <input name="nama" type="text" class="form-control" value="<?php echo $nama; ?>" placeholder="Update nama">
          </div>
          <div class="form-group">
            <input name="jenis" type="text" class="form-control" value="<?php echo $jenis; ?>" placeholder="Update jenis">
          </div>
          <div class="form-group">
            <input name="telepon" type="text" class="form-control" value="<?php echo $telepon; ?>" placeholder="Update telepon">
          </div>
          <div class="form-group">
            <input name="alamat" type="text" class="form-control" value="<?php echo $alamat; ?>" placeholder="Update alamat">
          </div>
          <button class="btn btn-success btn-block" name="update">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>
</div>
</main>
</body>
</html>