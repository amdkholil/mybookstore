<?php
$server="localhost";
$username="root";
$password="";
$database="toko_buku";

$mysqli=new mysqli($server,$username,$password,$database);
if($mysqli->connect_error){
	die("Koneksi gagal: ".$kon->connect_error);
}

?>
