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
	<title>RS DuBa</title>
    <style>
		.logo1 img{
            position: absolute;
            left: 50%;
			transform: translateX(-50%);
            margin-top: 00px;
			width: 270px; 
			height: 150px;
    	}
		.prgf{
			position: absolute;
			left: 50%;
			transform: translateX(-50%);
			margin-top: 200px;
		}
    </style>
</head>
<body>
	<div class="logo1">
		<img src="gambar/rslogo.png">
	</div>
	<div class="prgf";>
		<h4>Selamat datang di Rumah Sakit Medika Care, Surakarta.</h4>
	</div>
</body>
</html>

