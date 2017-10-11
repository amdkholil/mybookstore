<?php
session_start();
require_once 'config.php';

if(isset($_POST['simpan_buku'])){
	$kd_buku=$_POST['kd_buku'];
	$judul_buku=$_POST['judul_buku'];
	$pengarang=$_POST['pengarang'];
	$tahun=$_POST['tahun'];
	$harga=$_POST['harga'];
	$q=$mysqli->query("select kd_buku from tbl_buku where kd_buku='$kd_buku'");
	if($q->num_rows>0){
		$_SESSION['notif']="Kode buku sudah digunakan!!";
		echo "<script>javascript:history.go(-1)</script>";
	}
	else {
		$q=$mysqli->query("insert into tbl_buku values('$kd_buku','$judul_buku','$pengarang',$tahun,$harga)");
		$_SESSION['notif']="Data berhasil disimpan!";
		echo "<script>javascript:history.go(-1)</script>";
	}
}

if(isset($_POST['simpan_stok'])){
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

if(isset($_POST['ubah_buku'])){
	$kd_buku=$_POST['kd_buku'];
	$judul_buku=$_POST['judul_buku'];
	$pengarang=$_POST['pengarang'];
	$tahun=$_POST['tahun'];
	$harga=$_POST['harga'];
	$q=$mysqli->query("update tbl_buku set judul_buku='$judul_buku', pengarang='$pengarang', thn='$tahun', harga='$harga' where kd_buku='$kd_buku'") or die($_SESSION['notif']="Terjadi kesalahan");
	$_SESSION['notif']="Data berhasil disimpan!";
	echo "<script>javascript:history.go(-2)</script>";
}

if(isset($_GET['hapus_buku'])){
	$kd_buku=$_GET['hapus_buku'];
	$q=$mysqli->query("delete from tbl_buku where kd_buku='$kd_buku'");
	$_SESSION['notif']="Data berhasil dihapus!";
	header("Location: ../buku.php");
}

if(isset($_POST['simpan_pelanggan']) and $_POST['simpan_pelanggan']="Simpan"){
	$kd_pelanggan=$_POST['kd_pelanggan'];
	$nm_pelanggan=$_POST['nm_pelanggan'];
	$alamat=$_POST['alamat'];
	$q=$mysqli->query("select kd_pelanggan from tbl_pelanggan where kd_pelanggan='$kd_pelanggan'");
	if($q->num_rows>0){
		$_SESSION['notif']="Kode pelanggan sudah digunakan!!";
		echo "<script>javascript:history.go(-1)</script>";
	}
	else {
		$q=$mysqli->query("insert into tbl_pelanggan values('$kd_pelanggan','$nm_pelanggan','$alamat')");
		$_SESSION['notif']="Data berhasil disimpan!";
		echo "<script>javascript:history.go(-1)</script>";
	}
}

if(isset($_POST['ubah_pelanggan'])){
	$kd_pelanggan=$_POST['kd_pelanggan'];
	$nm_pelanggan=$_POST['nm_pelanggan'];
	$alamat=$_POST['alamat'];
	$q=$mysqli->query("update tbl_pelanggan set nama='$nm_pelanggan', alamat='$alamat'  where kd_pelanggan='$kd_pelanggan'") or die($_SESSION['notif']="Terjadi kesalahan");
	$_SESSION['notif']="Data berhasil disimpan!";
	echo "<script>javascript:history.go(-2)</script>";
}

if(isset($_GET['hapus_pelanggan'])){
	$kd_pelanggan=$_GET['hapus_pelanggan'];
	$q=$mysqli->query("delete from tbl_pelanggan where kd_pelanggan='$kd_pelanggan'");
	$_SESSION['notif']="Data berhasil dihapus!";
	header("Location: ../pelanggan.php");
}

if(isset($_POST['simpan_transaksi'])){
    $kd_buku=$_POST['kd_buku'];
    $harga=$_POST['harga'];
    for($x=0;$x<count($kd_buku);$x++){
    	echo "<br>".$x." ".$harga[$x]." ".$kd_buku[$x];
    }
}


$_SESSION['notif']="Data berhasil disimpan!";
		header("Location:../transaksi.php");
?>
