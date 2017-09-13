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
?>

<!---------------------------------------------------------------------------------->
<!--------------------------------- Fungsi Javascript ------------------------------>
<!---------------------------------------------------------------------------------->
<script type="text/javascript">

$(document).ready(function(){setTimeout(function(){$(".notif").fadeIn('fast');}, 500);});
setTimeout(function(){$(".notif").fadeOut('slow');}, 3000);


</script>