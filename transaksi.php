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






<?php include 'footer.php'; ?>