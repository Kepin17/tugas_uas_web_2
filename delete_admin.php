<?php
session_start();
include("koneksi.php");

if(isset($_GET['id_admin'])) {
  $id_admin = mysqli_real_escape_string($conn, $_GET['id_admin']);

  $query = "DELETE FROM admin WHERE id_admin = '$id_admin'";

  $result = mysqli_query($conn, $query);

  if(!$result) {
    die("Query Failed: " . mysqli_error($conn));
  }

  $_SESSION['message'] = 'Data berhasil dihapus';
  $_SESSION['message_type'] = 'danger';

  header('Location: data_admin.php');
}
?>
