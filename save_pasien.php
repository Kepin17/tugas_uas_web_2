<?php
session_start();
include('koneksi.php');

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['save_jadwal'])) {
    $id_dokter = clean_input($_POST['id_dokter']);
    $hari_praktek = clean_input($_POST['hari_praktek']);
    $jam_mulai = clean_input($_POST['jam_mulai']);
    $jam_selesai = clean_input($_POST['jam_selesai']);

    $query = "INSERT INTO jadwal (id_dokter, hari_praktek, jam_mulai, jam_selesai) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "isss",$id_dokter, $hari_praktek, $jam_mulai, $jam_selesai);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Data berhasil disimpan';
    $_SESSION['message_type'] = 'success';
    header('Location: data_jadwal.php');
    exit();
}

$conn->close();
?>