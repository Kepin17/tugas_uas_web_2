<?php
include("koneksi.php");
session_start();

if(isset($_GET['id_pasien'])) {
  $id_pasien = mysqli_real_escape_string($conn, $_GET['id_pasien']);

  $query = "DELETE FROM pasien WHERE id_pasien = '$id_pasien'";

  $result = mysqli_query($conn, $query);

  if(!$result) {
    die("Query Failed: " . mysqli_error($conn));
  }

  $_SESSION['message'] = 'Data berhasil dihapus';
  $_SESSION['message_type'] = 'danger';

  header('Location: data_pasien.php');
}
?>
