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
    <title>Tambah Admin</title>
    <style>
        .container {
            max-width: 800px;
            margin: 2rem auto;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            background: white;
            padding: 30px;
        }
        .card-header {
            background: #007bff;
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .btn-primary {
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,123,255,0.3);
        }
        .input-group {
            position: relative;
        }
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }
        .with-icon {
            padding-left: 40px;
        }
    </style>
</head>
<body>
<main class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="m-0"><i class="fas fa-user-plus mr-2"></i>Tambah Admin Baru</h3>
        </div>
        <form action="save_admin.php" method="POST" class="needs-validation" novalidate>
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" name="username" class="form-control with-icon" placeholder="Username Admin" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" name="password" class="form-control with-icon" placeholder="Password Admin" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-id-card input-icon"></i>
                    <input type="text" name="nama_admin" class="form-control with-icon" placeholder="Nama Admin" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" name="email" class="form-control with-icon" placeholder="Email Admin" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-map-marker-alt input-icon"></i>
                    <input type="text" name="alamat" class="form-control with-icon" placeholder="Alamat Admin" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <i class="fas fa-phone input-icon"></i>
                    <input type="text" name="telepon" class="form-control with-icon" placeholder="Telepon Admin" required>
                </div>
            </div>
            <button type="submit" name="save_admin" class="btn btn-primary btn-block">
                <i class="fas fa-save mr-2"></i>Simpan Admin
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
