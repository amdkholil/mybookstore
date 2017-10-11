<?php
session_start();
require_once 'lib/config.php';
$m="transaksi";
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
				<a href="transaksi.php"<?php cek($sm,"0","class=aktif") ?>>
					Transaksi
				</a>
			</li>
			<li>
				<a href="transaksi.php?sm=data_transaksi"<?php cek($sm,"tambah_pelanggan","class=aktif") ?>>
					Riwayat Transaksi
				</a>
			</li>
		</ul>
	</div>
</div>

<div class="row" style="margin-top: 30px;">
	<div class="col-sm-12">
		<form class="form-horizontal box" method="post" action="lib/proses.php">
            <div class="form-group">
                <label class="control-label col-sm-1">Tanggal :</label>
                <div class="col-sm-2">
                    <input type="text" name="tanggal" class="form-control input-sm" id="tanggal" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <label class="control-label col-sm-2">Kode Pelanggan :</label>
                <div class="col-sm-2">
                    <input type="text" name="kd_pelanggan" class="form-control input-sm" id="kd_pelanggan" autofocus>
                </div>
            </div>
            <div style="border-bottom: #999 2px dashed; margin:25px 0px 7px 0px;"></div>
            <div class="form-group top">
                <div class="col-sm-1"><span class="glyphicon glyphicon-edit"></div>
                <div class="col-sm-2">Kode Buku</div>
                <div class="col-sm-3">Judul Buku</div>
                <div class="col-sm-2">Harga</div>
                <div class="col-sm-1">Qty</div>
                <div class="col-sm-2">Total Harga</div>
            </div>
            <div style="border-bottom: #999 1px dashed; margin: 7px 30px 15px 5px;"></div>
						<div data-dynamic-form>
							<div data-dynamic-form-template="multy">
								<div class="form-group">
		            	<div class="col-sm-1" style="text-align: center;vertical-align: middle;">
		            		<btn class="btn btn-sm btn-default" data-toggle="tooltip" title="Tambah" data-dynamic-form-add>
		            			<span class="glyphicon glyphicon-plus"></span>
		            		</btn>
		            		<btn class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus" data-dynamic-form-remove>
		            			<span class="glyphicon glyphicon-remove"></span>
		            		</btn>
		            	</div>
	                <div class="col-sm-2">
	                    <input type="text" name="kd_buku[]" class="form-control input-sm kd_buku" id="kd_buku[ID]" data-dynamic-form-input-id-template="ID" list="kdbuku" required>
	                </div>
	                <div class="col-sm-3">
	                    <input type="text" name="judul_buku" class="form-control input-sm">
	                </div>
	                <div class="col-sm-2">
	                    <input type="text" name="harga[]" class="form-control input-sm" required>
	                </div>
	                <div class="col-sm-1">
	                    <input type="text" name="qty[]" class="form-control input-sm">
	                </div>
	                <div class="col-sm-2">
	                    <input type="text" name="tot_harga[]" class="form-control input-sm">
	                </div>
								</div>
							</div>
						</div>
            <div class="ctn" style="border-bottom: #999 2px dashed; margin-bottom: 18px; margin-top: 20px"></div>
            <div class="form-group">
                <div class="col-sm-2">
                    <input type="submit" name="simpan_transaksi" value="Simpan Transaksi" class="btn btn-sm btn-warning">
                </div>
                <div class="col-sm-6"></div>
                <div class="col-sm-3">
                    <input type="text" class="form-control input-sm" value="" readonly>
                </div>
            </div>
        </form>
	</div>
</div>

<script type="text/javascript" src="style/dynamic_forms.min.js"> </script>
<script>
    $(document).ready(function () {
        var dynamicForms = new DynamicForms();
        dynamicForms.automaticallySetupForm();
    });
</script>
<datalist id="kdbuku"></datalist>

<?php include 'footer.php'; ?>
