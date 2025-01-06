<?php
session_start();
include('koneksi.php');

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['save_pasien'])) {
    $nama_pasien = clean_input($_POST['nama_pasien']);
    $tanggal_lahir = clean_input($_POST['tanggal_lahir']);
    $jenis_kelamin = clean_input($_POST['jenis_kelamin']);
    $email = clean_input($_POST['email']);
    $alamat = clean_input($_POST['alamat']);
    $telepon = clean_input($_POST['telepon']);

    $query = "INSERT INTO pasien (nama_pasien, tanggal_lahir, jenis_kelamin, email, alamat, telepon) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssss",$nama_pasien, $tanggal_lahir, $jenis_kelamin, $email, $alamat, $telepon);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Data berhasil disimpan';
    $_SESSION['message_type'] = 'success';
    header('Location: data_pasien.php');
    exit();
}

$conn->close();
?>