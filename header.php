<!DOCTYPE html>
<html>
<head>
	<title>Toko Buku Bersama</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style/default.css">
	<script type="text/javascript" src="style/jquery-3.2.1.js"></script>
</head>
<body>
	<?php require 'lib/fungsi.php'; ?>
	<div class="container-fluid">
		<div class="row header">
			<div class="col-sm-12">
				<img src="logo.png" class="logo">
				Toko Buku Bersama
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row menu">
			<ul>
				<li>
					<a href="index.php"<?php cek($m,"beranda"," class=aktif"); ?>>
					Beranda
					</a>
				</li>
				<li>
					<a href="transaksi.php"<?php cek($m,"transaksi"," class=aktif"); ?>>
						Transaksi
					</a>
				</li>
				<li>
					<a href="buku.php"<?php cek($m,"buku"," class=aktif"); ?>>
						Buku
					</a>
				</li>
				<li>
					<a href="pelanggan.php"<?php cek($m,"pelanggan"," class=aktif"); ?>>
						Pelanggan
					</a></li>
				<li>
					<a href="pengaturan.php"<?php cek($m,"pengaturan"," class=aktif"); ?>>
						Pengaturan
					</a>
				</li>
		</div>
	</div>
	<div class="container">
		<div class="row content">