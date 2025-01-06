<?php
session_start();
include("koneksi.php");

$nama_admin = '';
$email = '';
$alamat = '';
$telepon = '';

if (isset($_GET['id_admin'])) {
    $id_admin = mysqli_real_escape_string($conn, $_GET['id_admin']);

    $query = "SELECT * FROM admin WHERE id_admin='$id_admin'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            $nama_admin = $row['nama_admin'];
            $email = $row['email'];
            $alamat = $row['alamat'];
            $telepon = $row['telepon'];
        }
    } else {
        die("Query failed: " . mysqli_error($conn));
    }
}

if (isset($_POST['update'])) {
    $nama_admin = mysqli_real_escape_string($conn, $_POST['nama_admin']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);

    $query = "UPDATE admin SET 
                nama_admin='$nama_admin', 
                email='$email', 
                alamat='$alamat', 
                telepon='$telepon'
              WHERE id_admin='$id_admin'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = 'Data berhasil dirubah';
        $_SESSION['message_type'] = 'primary';

        header('Location: data_admin.php');
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
    <title>Edit Admin</title>
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
        <form action="edit_admin.php?id_admin=<?php echo $_GET['id_admin']; ?>" method="POST">
          <div class="form-group">
            <input name="nama_admin" type="text" class="form-control" value="<?php echo $nama_admin; ?>" placeholder="Update nama">
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
          <button class="btn btn-primary btn-block" name="update">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>
</div>
</main>
</body>
</html>