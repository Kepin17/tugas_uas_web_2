<?php
session_start();
include('koneksi.php');

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['save_dokter'])) {
    $nama_dokter = clean_input($_POST['nama_dokter']);
    $spesialisasi = clean_input($_POST['spesialisasi']);
    $email = clean_input($_POST['email']);
    $alamat = clean_input($_POST['alamat']);
    $telepon = clean_input($_POST['telepon']);
    $status = clean_input($_POST['status']);

    $query = "INSERT INTO dokter (nama_dokter, spesialisasi, alamat, email, telepon, status) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssss",$nama_dokter, $spesialisasi, $email, $alamat, $telepon, $status);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Data berhasil disimpan';
    $_SESSION['message_type'] = 'success';
    header('Location: data_dokter.php');
    exit();
}

$conn->close();
?>