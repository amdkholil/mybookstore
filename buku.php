<?php
session_start();
require_once 'lib/config.php';
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

<?php if($sm=="0" and !isset($_GET['ubah'])){ ?>
<div class="row" style="margin-top: 30px">
	<div class="col-sm-12">
		<table id="tabel" class="table table-striped table-bordered table-hover" cellspacing="0" style="background-color: #fff;">
			<thead>
				<tr">
					<th style="width: 200px;">Kode Buku</th>
					<th>Judul Buku</th>
					<th>Pengarang</th>
					<th>Tahun</th>
					<th>Harga (Rp.)</th>
					<th>Stok (Pcs)</th>
					<th>Pilihan</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$q=$mysqli->query("select * from tbl_buku");
					if($q->num_rows>0){
						while ($d=$q->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $d['kd_buku']; ?></td>
								<td><?php echo $d['judul_buku']; ?></td>
								<td><?php echo $d['pengarang']; ?></td>
								<td><?php echo $d['thn']; ?></td>
								<td style="text-align:right"><?php echo rp($d['harga']); ?></td>
								<td style="text-align:center;"><?php echo stok($d['kd_buku']); ?></td>
								<td>
									<a href="?ubah=<?php echo $d['kd_buku']; ?>" class="btn btn-sm btn-warning">Ubah</a>
									<a href="" class="btn btn-sm btn-danger">Hapus</a>
							</tr>
					<?php
						}
					}
				 ?>
			</tbody>
		</table>
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
<?php } if($sm=="tambah_stok"){?>
<div class="row" style="margin-top:50px;">
	<div class="col-sm-12">
		<form action="lib/proses.php" method="post" class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-2">Kode Buku :</label>
				<div class="col-sm-2">
					<input type="text" name="kd_buku" class="form-control input-sm" id="kd_buku" autofocus>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Tanggal :</label>
				<div class="col-sm-2">
					<input type="text" name="tanggal" class="form-control input-sm" id="tanggal">
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

<?php } if(isset($_GET['ubah']))
{ 
	$kd_buku=$_GET['ubah'];
	$q=$mysqli->query("select * from tbl_buku where kd_buku='$kd_buku'");
	$d=$q->fetch_assoc();
	?>
<div class="row" style="margin-top: 50px;">
	<div class="col-sm-12">
	<form method="post" action="lib/proses.php" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2">Kode Buku :</label>
			<div class="col-sm-2">
				<input type="text" name="kd_buku" class="input-sm form-control" value="<?php echo $kd_buku; ?>" readonly>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Judul Buku :</label>
			<div class="col-sm-9">
				<input type="text" name="judul_buku" class="input-sm form-control" value="<?php echo $d['judul_buku']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Pengarang :</label>
			<div class="col-sm-3">
				<input type="text" name="pengarang" class="input-sm form-control" value="<?php echo $d['pengarang']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Tahun Terbit :</label>
			<div class="col-sm-2">
				<input type="text" name="tahun" class="input-sm form-control" value="<?php echo $d['thn']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Harga Jual :</label>
			<div class="col-sm-2">
				<input type="text" name="harga" class="input-sm form-control" value="<?php echo $d['harga']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2"></label>
			<div class="col-sm-3">
				<input type="submit" name="simpan_buku" value="Simpan" class="btn btn-sm btn-warning">
				<input type="button" value="Kembali" class="btn btn-sm btn-default" onclick="javascript:history.go(-1)">
			</div>
		</div>
	</form>
</div>
</div>

<?php } ?>
<?php include 'footer.php'; ?>
