<?php
$server="localhost";
$username="root";
$password="";
$database="toko_buku";

$kon=new mysqli($server,$username,$password,$database);
if($kon->connect_error){
	die("Koneksi gagal: ".$kon->connect_error);
}

?>