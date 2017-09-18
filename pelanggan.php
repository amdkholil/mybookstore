<?php

$m="pelanggan";
include 'header.php';
if(isset($_GET['sm'])){
	$sm=$_GET['sm'];
}
else{
	$sm="0";
}
?>

<div class="row">
	<div class="col-sm-12">
		<ul class="sm">
			<li>
				<a href="pelanggan.php"<?php cek($sm,"0","class=aktif") ?>>
					Data Pelanggan
				</a>
			</li>
			<li>
				<a href="pelanggan.php?sm=tambah_pelanggan"<?php cek($sm,"tambah_pelanggan","class=aktif") ?>>
					Tambah Data Pelanggan
				</a>
			</li>
		</ul>
	</div>
</div>

<?php if($sm=="tambah_pelanggan"){ //form tambah data pelanggan ?>
<div class="row" style="margin-top: 50px;">
	<div class="col-sm-12">
		<form method="post" action="lib/proses.php" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2">Kode Planggan :</label>
				<div class="col-sm-2">
					<input type="text" name="kd_pelanggan" class="form-control input-sm" autofocus>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Nama Pelanggan :</label>
				<div class="col-sm-3">
					<input type="text" name="nm_pelanggan" class="form-control input-sm">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Alamat :</label>
				<div class="col-sm-9">
					<input type="text" name="alamat" class="form-control input-sm">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-9">
					<input type="submit" name="simpan_pelanggan" value="Simpan" class="btn btn-sm btn-warning">
					<input type="reset" value="Reset" class="btn btn-sm btn-default">
				</div>
			</div>
		</form>
	</div>
</div>

<?php } ?>




<?php include 'footer.php'; ?>