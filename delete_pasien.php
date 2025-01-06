<?php
include("koneksi.php");
session_start();

if(isset($_GET['ids'])) {
  $ids = mysqli_real_escape_string($conn, $_GET['ids']);

  $query = "DELETE FROM supplier WHERE ids = '$ids'";

  $result = mysqli_query($conn, $query);

  if(!$result) {
    die("Query Failed: " . mysqli_error($conn));
  }

  $_SESSION['message'] = 'Data berhasil dihapus';
  $_SESSION['message_type'] = 'danger';

  header('Location: data_supplier.php');
}
?>
