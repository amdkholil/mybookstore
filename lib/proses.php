<?php
session_start();
require_once 'config.php';

if(isset($_POST['simpan_buku']) and $_POST['simpan_buku']="Simpan"){
	$kd_buku=$_POST['kd_buku'];
	$judul_buku=$_POST['judul_buku'];
	$pengarang=$_POST['pengarang'];
	$tahun=$_POST['tahun'];
	$harga=$_POST['harga'];

	$q=$kon->query("insert into tbl_buku values('$kd_buku','$judul_buku','$pengarang',$tahun,$harga)");
	$_SESSION['notif']="Data berhasil disimpan!";
	echo "<script>javascript:history.go(-1)</script>";
}


?>