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
        .form-group {
            margin-bottom: 1.8rem;
        }
        .input-group {
            position: relative;
            margin-bottom: 1rem;
        }
        .form-control {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border-radius: 12px;
            border: 2px solid #e0e0e0;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        .form-control:focus {
            border-color: #2196F3;
            background: white;
            box-shadow: 0 0 0 4px rgba(33,150,243,0.1);
            outline: none;
        }
        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #757575;
            transition: color 0.3s ease;
        }
        .form-control:focus + .input-icon {
            color: #2196F3;
        }
        .btn-primary {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #2196F3, #1976D2);
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(33,150,243,0.4);
        }
        .btn-primary:active {
            transform: translateY(0);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                margin: 1rem auto;
            }
            .card {
                padding: 20px;
            }
            .form-control {
                padding: 12px 20px 12px 45px;
            }
        }

        /* Animation for form elements */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-group {
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
        .form-group:nth-child(6) { animation-delay: 0.6s; }
    </style>
</head>
<body>
<main class="container">
    <div class="card">
        <div class="card-header">
            <i class="fas fa-user-plus"></i>
            <h3>Tambah Admin Baru</h3>
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
