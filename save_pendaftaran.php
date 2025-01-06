<?php
session_start();
include('koneksi.php');

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['save_pendaftaran'])) {
    $id_pasien = clean_input($_POST['id_pasien']);
    $id_dokter = clean_input($_POST['id_dokter']);
    $tanggal_daftar = clean_input($_POST['tanggal_daftar']);
    $keluhan = clean_input($_POST['keluhan']);

    $query = "INSERT INTO pendaftaran (id_pasien, id_dokter, tanggal_daftar, keluhan) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iiss",$id_pasien, $id_dokter, $tanggal_daftar, $keluhan);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Data berhasil disimpan';
    $_SESSION['message_type'] = 'success';
    header('Location: data_pendaftaran.php');
    exit();
}

$conn->close();
?>