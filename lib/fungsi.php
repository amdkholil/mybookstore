<?php
function cek($a,$b,$c){
	if ($a==$b) { $d=$c; }
	else{ $d=""; }
	echo $d;
}

function notif()
{
	if (isset($_SESSION['notif']) and $_SESSION['notif'] <> "")
	{
		echo "<div class='notif'>".$_SESSION['notif']."</div>";
	}
	$_SESSION['notif']="";
}

function rp($angka){
	$h=number_format($angka,2,",",".");
	return $h;
}

function kd_buku(){
	require 'config.php';
	$kd_buku=array();
	$q=$mysqli->query("select * from tbl_buku");
	while ($d=$q->fetch_assoc()) {
		$kd_buku[]=$d['kd_buku'];
	}
	$result=json_encode($kd_buku);
	return $result;
}

function stok($kd_buku){
	require 'config.php';
	//buku masuk
	$q1=$mysqli->query("SELECT SUM(tbl_buku_masuk.qty) as qty1 FROM tbl_buku_masuk where kd_buku='$kd_buku'");
	$d1=$q1->fetch_assoc();
	$qty1=$d1['qty1'];
	if(is_null($qty1)){ $qty1=0; }
	//buku keluar
	$q2=$mysqli->query("SELECT sum(tbl_buku_keluar.qty) as qty2 FROM tbl_buku_keluar where kd_buku='$kd_buku'");
	$d2=$q2->fetch_assoc();
	$qty2=$d2['qty2'];
	if(is_null($qty2)){ $qty2=0; }
	//hitung stok
	return $qty1-$qty2;
}


?>

<!---------------------------------------------------------------------------------->
<!--------------------------------- Fungsi Javascript ------------------------------>
<!---------------------------------------------------------------------------------->
<script type="text/javascript">

$(document).ready(function(){setTimeout(function(){$(".notif").fadeIn('fast');}, 500);});
setTimeout(function(){$(".notif").fadeOut('slow');}, 3000);

$(document).ready(function(){
	$("#tanggal").datepicker({
		dateFormat: 'yy-mm-dd'
	});
});

$(document).ready(function(){
	var kd_buku= <?php echo kd_buku(); ?>;
	$("#kd_buku").autocomplete({
		source : kd_buku
	});
});
$(document).ready(function() {
	$('#tabel').DataTable({
		'info':false,
		'lengthChange':false,
		"lengthMenu": [[10], [10]]
	});
});

function hapus(){
    if(confirm('Hapus data?')){
    	return true;
    }else{
    	return false;    
    }
}

</script>
