<?php
session_start();
include('header_footer.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
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
        <form action="save_admin.php" method="POST">
        <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username Admin" required>
            </div>
            <div class="form-group">
                <input type="text" name="password" class="form-control" placeholder="Password Admin" required>
            </div>
            <div class="form-group">
                <input type="text" name="nama_admin" class="form-control" placeholder="Nama Admin" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email Admin" required>
            </div>
            <div class="form-group">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat Admin" required>
            </div>
            <div class="form-group">
                <input type="text" name="telepon" class="form-control" placeholder="Telepon Admin" required>
            </div>
            <input type="submit" name="save_admin" class="btn btn-primary btn-block" value="Simpan Admin">
        </form>
    </div>
</main>
