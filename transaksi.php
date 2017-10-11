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
            <div class="form-group">
            	<div class="col-sm-1" style="text-align: center;vertical-align: middle;">
            		<div class="btn btn-sm btn-default add-more" data-toggle="tooltip" title="Tambah">
            			<span class="glyphicon glyphicon-plus"></span>
            		</div>
            	</div>
                <div class="col-sm-2">
                    <input type="text" name="kd_buku[]" class="form-control input-sm kd_buku" id="kd_buku">
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
                <div class="col-sm-2">
                    <input type="text" name="tot_harga[]" class="form-control input-sm">
                </div>
            </div>
            <div class="form-group">
            	<div class="col-sm-1" style="text-align: center;vertical-align: middle;">
            		<div class="btn btn-sm btn-danger remove" data-toggle="tooltip" title="Hapus!">
            			<span class="glyphicon glyphicon-remove"></span>
            		</div>
            	</div>
                <div class="col-sm-2">
                    <input type="text" name="kd_buku[]" class="form-control input-sm kd_buku" id="kd_buku">
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
                <div class="col-sm-2">
                    <input type="text" name="tot_harga[]" class="form-control input-sm">
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
<div class="copy hide">
	<div class="form-group">
		<div class="col-sm-1" style="text-align: center;vertical-align: middle;">
 				<div class="btn btn-sm btn-danger remove" data-toggle="tooltip" title="Hapus">
   				<span class="glyphicon glyphicon-remove"></span>
   			</div>
   	</div>
    <div class="col-sm-2">
        <input type="text" name="kd_buku[]" class="form-control input-sm kd_buku" id="kd_buku">
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
    <div class="col-sm-2">
        <input type="text" name="tot_harga[]" class="form-control input-sm">
    </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
			var x=1;
			function increment() {
				i +=1;
			}
			$('[data-toggle="tooltip"]').tooltip();
      $(".add-more").click(function(){
				if (x<=4) {
					var html = $(".copy").html();
          $(".ctn").before(html);
					$(".kd_buku")
						.attr("id",function () {
							return "kd_buku" + x;
						});
					x++;
				}
				if(x==4) {
					$(".add-more").attr({
						"data-toggle":"tooltip",
						"title":"Maks"
					});
				}
      });
      $("body").on("click",".remove",function(){
          $(this).parents(".form-group").remove();
					x--;
					$(".add-more").attr({
						"data-toggle":"tooltip",
						"title":"Tambah"
					});
      });
    });
</script>

<?php include 'footer.php'; ?>
