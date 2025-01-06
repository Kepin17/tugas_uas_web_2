<?php
session_start();
include('header_footer.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokter</title>
    <style>
        .container {
            position: absolute-center;
            margin-top: 0px;
            width: 800px;
        }
    </style>
</head>
<main class="container">
    <div class="card card-body">
        <form action="save_dokter.php" method="POST">
        <div class="form-group">
                <input type="text" name="nama_dokter" class="form-control" placeholder="Nama Dokter" required>
            </div>
            <div class="form-group">
                <input type="text" name="spesialisasi" class="form-control" placeholder="Spesialisasi Dokter" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email Dokter" required>
            </div>
            <div class="form-group">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat Dokter" required>
            </div>
            <div class="form-group">
                <input type="text" name="telepon" class="form-control" placeholder="Telepon Dokter" required>
            </div>
            <div class="form-group">
                <label for="status">Status Dokter</label>
                <select name="status" class="form-control" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Non-Aktif">Non-Aktif</option>
                </select>
            </div>
            <input type="submit" name="save_dokter" class="btn btn-primary btn-block" value="Simpan Dokter">
        </form>
    </div>
</main>
