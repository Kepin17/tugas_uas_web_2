<?php
session_start();
include("koneksi.php");

$nama_dokter = '';
$hari_praktek = '';
$jam_mulai = '';
$jam_selesai = '';

if (isset($_GET['id_jadwal'])) {
    $id_jadwal = mysqli_real_escape_string($conn, $_GET['id_jadwal']);

    $query = "SELECT * FROM jadwal WHERE id_jadwal='$id_jadwal'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            $id_dokter = $row['id_dokter'];
            $hari_praktek = $row['hari_praktek'];
            $jam_mulai = $row['jam_mulai'];
            $jam_selesai = $row['jam_selesai'];
        }
    } else {
        die("Query failed: " . mysqli_error($conn));
    }
}

if (isset($_POST['update'])) {
    $id_dokter = mysqli_real_escape_string($conn, $_POST['id_dokter']);
    $hari_praktek = mysqli_real_escape_string($conn, $_POST['hari_praktek']);
    $jam_mulai = mysqli_real_escape_string($conn, $_POST['jam_mulai']);
    $jam_selesai = mysqli_real_escape_string($conn, $_POST['jam_selesai']);

    $query = "UPDATE jadwal SET 
                id_dokter='$id_dokter', 
                hari_praktek='$hari_praktek', 
                jam_mulai='$jam_mulai', 
                jam_selesai='$jam_selesai'
              WHERE id_jadwal='$id_jadwal'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = 'Data berhasil dirubah';
        $_SESSION['message_type'] = 'primary';

        header('Location: data_jadwal.php');
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
    <title>Edit Jadwal</title>
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
        <form action="edit_jadwal.php?id_jadwal=<?php echo $_GET['id_jadwal']; ?>" method="POST">
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
            <input name="jam_mulai" type="text" class="form-control" value="<?php echo $jam_mulai; ?>" placeholder="Update jam mulai">
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