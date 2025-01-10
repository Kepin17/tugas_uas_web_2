<?php
session_start();
include('header_footer.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Tambah Dokter</title>
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            max-width: 900px;
            margin: 3rem auto;
            padding: 0 20px;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
            background: white;
            padding: 40px;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background: linear-gradient(135deg, #2196F3, #1976D2);
            color: white;
            padding: 20px 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(33,150,243,0.2);
        }
        .card-header h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<main class="container">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-user-md"></i>
            <h3>Tambah Dokter Baru</h3>
        </div>
        <form action="save_dokter.php" method="POST" class="needs-validation" novalidate>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="nama_dokter" class="form-control with-icon" placeholder="Nama Dokter" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="spesialisasi" class="form-control with-icon" placeholder="Spesialisasi Dokter" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="email" name="email" class="form-control with-icon" placeholder="Email Dokter" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="alamat" class="form-control with-icon" placeholder="Alamat Dokter" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="telepon" class="form-control with-icon" placeholder="Telepon Dokter" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <select name="status" class="form-control with-icon" required>
                        <option value="">Pilih Status Dokter</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Non-Aktif">Non-Aktif</option>
                    </select>
                </div>
            </div>
            <button type="submit" name="save_dokter" class="btn btn-primary btn-block">
                <i class="fas fa-save mr-2"></i>Simpan Dokter
            </button>
        </form>
    </div>
</main>

<script>
// Form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>

</body>
</html>
