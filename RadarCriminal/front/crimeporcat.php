<?php 


include_once "/view/CrimeView.php";
include_once "/view/TempoView.php";
include_once "/view/NaturezaView.php";
include_once "/view/CategoriaView.php";
$crimeVW = new CrimeView();
$tempoVW = new TempoView();
$naturezaVW = new NaturezaView();
$categoriaVW = new CategoriaView();
$idCategoria = isset( $_GET['id'] ) ? $_GET['id'] : null;

?>
<!-- start: Content -->
<div id="content" class="span10">

	<?php 
	$tr = $naturezaVW->aposBarraLateral($idCategoria);
	for($i=0;$i<count($tr);$i++){
		echo utf8_encode($tr[$i]);
	}
	?>

</div>
<!-- end: Content -->

</div>
<!--/fluid-row-->
