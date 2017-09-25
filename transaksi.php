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
                    <input type="text" name="kd_pelanggan" class="form-control input-sm" autofocus>
                </div>
            </div>
            <div style="border: #999 1px dashed; margin-bottom: 18px;"></div>
            <div class="form-group top">
                <div class="col-sm-2">Kode Buku</div>
                <div class="col-sm-3">Judul Buku</div>
                <div class="col-sm-2">Harga</div>
                <div class="col-sm-1">Qty</div>
                <div class="col-sm-3">Total Harga</div>
                <div class="col-sm-1">
                </div>
            </div>
            <div class="form-group ctn">
                <div class="col-sm-2">
                    <input type="text" name="kd_buku[]" class="form-control input-sm"> 
                </div>
                <div class="col-sm-3">
                    <input type="text" name="judul_buku" class="form-control input-sm">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="harga[]" class="form-control input-sm">
                </div>
                <div class="col-sm-1">
                    <input type="text" name="qty[]" class="form-control input-sm">
                </div>
                <div class="col-sm-3">
                    <input type="text" name="tot_harga[]" class="form-control input-sm">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                    <a class="add-more">
                        <span class="glyphicon glyphicon-plus" style="padding: 3px; border: 1px solid #000; border-radius: 3px;"></span>
                    </a>
                </div>
            </div>
            <div style="border: #999 1px dashed; margin-bottom: 18px; margin-top: 10px"></div>
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
<div class="copy hide">
    <div class="form-group">
        <div class="col-sm-2">
            <input type="text" name="kd_buku[]" class="form-control input-sm"> 
        </div>
        <div class="col-sm-3">
            <input type="text" name="judul_buku" class="form-control input-sm">
        </div>
        <div class="col-sm-2">
            <input type="text" name="harga[]" class="form-control input-sm">
        </div>
        <div class="col-sm-1">
            <input type="text" name="qty[]" class="form-control input-sm">
        </div>
        <div class="col-sm-3">
            <input type="text" name="tot_harga[]" class="form-control input-sm">
        </div>
        <div class="col-sm-1">
            <a class="btn btn-sm btn-danger" id="remove"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".ctn").after(html);
      });
      $("body").on("click","#remove",function(){ 
          $(this).parents(".form-group").remove();
      });
    });
</script>

<?php include 'footer.php'; ?>