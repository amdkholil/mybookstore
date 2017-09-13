<?php
session_start();
$m="buku";
if(isset($_GET['sm'])){
	$sm=$_GET['sm'];
}
else{
	$sm="0";
}
include 'header.php';

notif();
?>
<div class="row">
	<div class="col-sm-12">
		<ul class="sm">
			<li>
				<a href="buku.php"<?php cek($sm,"0"," class=aktif") ?>>
					Data Buku
				</a>
			</li>
			<li>
				<a href="buku.php?sm=tambah_stok"<?php cek($sm,"tambah_stok"," class=aktif") ?>>
					Tambah Stok Buku
				</a>
			</li>
			<li>
				<a href="buku.php?sm=tambah_data"<?php cek($sm,"tambah_data"," class=aktif") ?>>
					Tambah Data Buku
				</a>
			</li>
		</ul>
	</div>
</div>

<?php if($sm=="0"){ ?>
<div class="row" style="margin-top: 50px">
	<div class="col-sm-12">
		<table></table>
	</div>
</div>

<?php } if($sm=="tambah_data"){ ?>
<div class="row" style="margin-top: 50px;">
	<div class="col-sm-12">
	<form method="post" action="lib/proses.php" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2">Kode Buku :</label>
			<div class="col-sm-2">
				<input type="text" name="kd_buku" class="input-sm form-control" autofocus>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Judul Buku :</label>
			<div class="col-sm-9">
				<input type="text" name="judul_buku" class="input-sm form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Pengarang :</label>
			<div class="col-sm-3">
				<input type="text" name="pengarang" class="input-sm form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Tahun Terbit :</label>
			<div class="col-sm-2">
				<input type="text" name="tahun" class="input-sm form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Harga Jual :</label>
			<div class="col-sm-2">
				<input type="text" name="harga" class="input-sm form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2"></label>
			<div class="col-sm-3">
				<input type="submit" name="simpan_buku" value="Simpan" class="btn btn-sm btn-warning">
				<input type="reset" value="Reset" class="btn btn-sm btn-default">
			</div>
		</div>
	</form>
</div>
</div>
<?php
}
?>

<?php
if($sm=="tambah_stok"){
?>
<div class="row" style="margin-top:50px;">
	<div class="col-sm-12">
		<form action="lib/proses.php" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2">Kode Buku :</label>
				<div class="col-sm-2">
					<input type="text" name="kd_barang" class="form-control input-sm" autofocus>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Tanggal :</label>
				<div class="col-sm-2">
					<input type="text" name="tanggal" class="form-control input-sm">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Jumlah :</label>
				<div class="col-sm-2">
					<input type="text" name="qty" class="form-control input-sm">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-5">
					<input type="submit" name="simpan_stok" value="simpan" class="btn btn-sm btn-warning">
					<input type="reset" value="Reset" class="btn btn-sm btn-default">
				</div>
			</div>
		</form>
	</div>
</div>
<?php } ?>
<?php include 'footer.php'; ?>