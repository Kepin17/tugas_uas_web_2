<?php
session_start();
include('koneksi.php');

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['save_admin'])) {
    $username = clean_input($_POST['username']);
    $password = clean_input($_POST['password']);
    $nama_admin = clean_input($_POST['nama_admin']);
    $email = clean_input($_POST['email']);
    $alamat = clean_input($_POST['alamat']);
    $telepon = clean_input($_POST['telepon']);

    $query = "INSERT INTO admin (username, password, nama_admin, email, alamat, telepon) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssss",$username, $password, $nama_admin, $email, $alamat, $telepon);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Data berhasil disimpan';
    $_SESSION['message_type'] = 'success';
    header('Location: data_admin.php');
    exit();
}

$conn->close();
?>