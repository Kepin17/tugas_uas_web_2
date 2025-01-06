<?php
session_start();
include('header_footer.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pasien</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<main class="modern-container">
    <div class="modern-card">
        <div class="modern-card-header">
            <h3 class="m-0">
                <i class="fas fa-user-plus mr-2"></i>
                Tambah Pasien Baru
            </h3>
        </div>
        
        <form action="save_pasien.php" method="POST" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6">
                    <div class="modern-form-group">
                        <i class="fas fa-user modern-input-icon"></i>
                        <input type="text" name="nama_pasien" class="modern-input" 
                               placeholder="Nama Lengkap Pasien" required>
                    </div>
                    
                    <div class="modern-form-group">
                        <i class="fas fa-calendar-alt modern-input-icon"></i>
                        <input type="date" name="tanggal_lahir" class="modern-input" required>
                    </div>
                    
                    <div class="modern-form-group">
                        <i class="fas fa-venus-mars modern-input-icon"></i>
                        <select name="jenis_kelamin" class="modern-input" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="modern-form-group">
                            <i class="fas fa-envelope modern-input-icon"></i>
                            <input type="email" name="email" class="modern-input" 
                                   placeholder="Email" required>
                        </div>
                    <div class="modern-form-group">
                        <i class="fas fa-map-marker-alt modern-input-icon"></i>
                        <textarea name="alamat" class="modern-input" 
                                  placeholder="Alamat Lengkap" required></textarea>
                    </div>
                    
                    <div class="modern-form-group">
                        <i class="fas fa-phone modern-input-icon"></i>
                        <input type="tel" name="telepon" class="modern-input" 
                               placeholder="Nomor Telepon" required>
                    </div>
                    
                </div>
            </div>
            
            <div class="text-center mt-4">
                <button type="submit" name="save_pasien" class="modern-button btn-primary">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Data Pasien
                </button>
            </div>
        </form>
    </div>
</main>

<script>
// Form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        Array.prototype.filter.call(forms, function(form) {
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
