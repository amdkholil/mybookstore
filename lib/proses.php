<?php
session_start();
require_once 'config.php';

if(isset($_POST['simpan_buku']) and $_POST['simpan_buku']="Simpan"){
	$kd_buku=$_POST['kd_buku'];
	$judul_buku=$_POST['judul_buku'];
	$pengarang=$_POST['pengarang'];
	$tahun=$_POST['tahun'];
	$harga=$_POST['harga'];

	$q=$mysqli->query("insert into tbl_buku values('$kd_buku','$judul_buku','$pengarang',$tahun,$harga)");
	$_SESSION['notif']="Data berhasil disimpan!";
	echo "<script>javascript:history.go(-1)</script>";
}

if(isset($_POST['simpan_stok']) and $_POST['simpan_buku']="simpan"){
	$kd_buku=$_POST['kd_buku'];
	$tgl=$_POST['tanggal'];
	$qty=$_POST['qty'];
	$q=$mysqli->query("select kd_buku from tbl_buku where kd_buku='$kd_buku'");
	if($q->num_rows<1){
		$_SESSION['notif']="Kode Buku tidak sesuai!";
		echo "<script>javascript:history.go(-1)</script>";
	}
	else {
		$q=$mysqli->query("insert into tbl_buku_masuk values('','$kd_buku','$tgl','$qty')");
		$_SESSION['notif']="Data berhasil disimpan!";
		echo "<script>javascript:history.go(-1)</script>";
	}
}

if(isset($_POST['simpan_pelanggan']) and $_POST['simpan_pelanggan']="Simpan"){
	$kd_pelanggan=$_POST['kd_pelanggan'];
	$nm_pelanggan=$_POST['nm_pelanggan'];
	$alamat=$_POST['alamat'];

	$q=$mysqli->query("insert into tbl_pelanggan values('$kd_pelanggan','$nm_pelanggan','$alamat')");
	$_SESSION['notif']="Data berhasil disimpan!";
	echo "<script>javascript:history.go(-1)</script>";
}

?>