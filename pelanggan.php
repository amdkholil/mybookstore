<?php
session_start();
require_once 'lib/config.php';
$m="pelanggan";
include 'header.php';
if(isset($_GET['sm'])){
	$sm=$_GET['sm'];
}
else{
	$sm="0";
}
notif();
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

<?php if($sm=="0" and !isset($_GET['ubah'])) { ?>
<div class="row" style="margin-top: 30px;">
	<div class="col-sm-12">
		<table id="tabel" class="table table-hover table-bordered table-striped" style="background-color: #fff">
			<thead>
				<tr>
					<th>Kode Pelanggan</th>
					<th>Nama Pelanggan</th>
					<th>Alamat</th>
					<th>Pilihan</th>
				</tr>
			</thead>
			<tbody>
				<?php $q=$mysqli->query("select * from tbl_pelanggan");
						if ($q->num_rows>0) {
						while($d=$q->fetch_assoc()) { ?>
				<tr>
					<td><?php echo $d['kd_pelanggan']; ?></td>
					<td><?php echo $d['nama']; ?></td>
					<td><?php echo $d['alamat']; ?></td>
					<td>
						<a href="?ubah=<?php echo $d['kd_pelanggan']; ?>" class="btn btn-sm btn-warning">Ubah</a>
						<a href="lib/proses.php?hapus_pelanggan=<?php echo $d['kd_pelanggan']; ?>" class="btn btn-sm btn-danger" onclick="return hapus()">Hapus</a>
					</td>
				</tr>
				<?php } }?>
			</tbody>
		</table>	
	</div>
</div>
<?php } if($sm=="tambah_pelanggan"){ //form tambah data pelanggan ?>
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
<?php } if(isset($_GET['ubah'])) { 
	$q=$mysqli->query("select * from tbl_pelanggan where kd_pelanggan='$_GET[ubah]'");
	$d=$q->fetch_assoc();
	?>
<div class="row" style="margin-top: 50px;">
	<div class="col-sm-12">
		<form method="post" action="lib/proses.php" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2">Kode Planggan :</label>
				<div class="col-sm-2">
					<input type="text" name="kd_pelanggan" class="form-control input-sm" value="<?php echo $d['kd_pelanggan']; ?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Nama Pelanggan :</label>
				<div class="col-sm-3">
					<input type="text" name="nm_pelanggan" class="form-control input-sm" value="<?php echo $d['nama']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Alamat :</label>
				<div class="col-sm-9">
					<input type="text" name="alamat" class="form-control input-sm" value="<?php echo $d['alamat']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-sm-9">
					<input type="submit" name="ubah_pelanggan" value="Simpan" class="btn btn-sm btn-warning">
					<input type="button" value="Kembali" class="btn btn-sm btn-default" onclick="javascript:history.go(-1);">
				</div>
			</div>
		</form>
	</div>
</div>
<?php } include 'footer.php'; ?>