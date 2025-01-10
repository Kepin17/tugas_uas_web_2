<?php
session_start();
include("koneksi.php");
include('header_footer.php');
include('script.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>RS DuBa - Rumah Sakit Terbaik di Surakarta</title>
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://rs-antonius.com/wp-content/uploads/2022/08/antonius1000x400-1000x400.jpg');
            background-size: cover;
            background-position: center;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero-content {
            max-width: 800px;
            padding: 20px;
        }

        .services-section {
            padding: 60px 0;
            background: #f8f9fa;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }

        .service-card i {
            font-size: 40px;
            color: #007bff;
            margin-bottom: 15px;
        }

        .about-section {
            padding: 60px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 30px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            margin-top: 20px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            font-weight: bold;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }

        .cta-button:hover {
            background: white;
            color: #007bff;
            border: 2px solid #007bff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .cta-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
       
    </style>
</head>
<body>
    <section class="hero-section">
        <div class="hero-content">
            <h1>Selamat Datang di RS Medika Care</h1>
            <p>Memberikan pelayanan kesehatan terbaik dengan sentuhan kemanusiaan</p>
            <a href="tambah_pendaftaran.php" class="cta-button">Buat Janji Temu</a>
        </div>
    </section>

    <section class="services-section">
        <div class="section-title">
            <h2>Layanan Kami</h2>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <i class="fas fa-user-md"></i>
                <h3>Dokter Spesialis</h3>
                <p>Tim dokter spesialis berpengalaman siap melayani Anda</p>
            </div>
            <div class="service-card">
                <i class="fas fa-ambulance"></i>
                <h3>Layanan Darurat 24/7</h3>
                <p>Siap siaga 24 jam untuk menangani keadaan darurat</p>
            </div>
            <div class="service-card">
                <i class="fas fa-heartbeat"></i>
                <h3>Fasilitas Modern</h3>
                <p>Dilengkapi dengan peralatan medis modern</p>
            </div>
        </div>
    </section>

 
</body>
</html>

