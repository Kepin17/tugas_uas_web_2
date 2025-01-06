<?php
include("koneksi.php");
session_start();

if(isset($_GET['id_jadwal'])) {
  $id_jadwal = mysqli_real_escape_string($conn, $_GET['id_jadwal']);

  $query = "DELETE FROM jadwal WHERE id_jadwal = '$id_jadwal'";

  $result = mysqli_query($conn, $query);

  if(!$result) {
    die("Query Failed: " . mysqli_error($conn));
  }

  $_SESSION['message'] = 'Data berhasil dihapus';
  $_SESSION['message_type'] = 'danger';

  header('Location: data_jadwal.php');
}
?>
