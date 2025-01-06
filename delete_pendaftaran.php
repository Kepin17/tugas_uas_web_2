<?php
include("koneksi.php");
session_start();

if(isset($_GET['id_pendaftaran'])) {
  $id_pendaftaran = mysqli_real_escape_string($conn, $_GET['id_pendaftaran']);

  $query = "DELETE FROM pendaftaran WHERE id_pendaftaran = '$id_pendaftaran'";

  $result = mysqli_query($conn, $query);

  if(!$result) {
    die("Query Failed: " . mysqli_error($conn));
  }

  $_SESSION['message'] = 'Data berhasil dihapus';
  $_SESSION['message_type'] = 'danger';

  header('Location: data_pendaftaran.php');
}
?>
