<?php
include("koneksi.php");
session_start();

if(isset($_GET['id_dokter'])) {
  $id_dokter = mysqli_real_escape_string($conn, $_GET['id_dokter']);

  $query = "DELETE FROM dokter WHERE id_dokter = '$id_dokter'";

  $result = mysqli_query($conn, $query);

  if(!$result) {
    die("Query Failed: " . mysqli_error($conn));
  }

  $_SESSION['message'] = 'Data berhasil dihapus';
  $_SESSION['message_type'] = 'danger';

  header('Location: data_dokter.php');
}
?>
