<?php 
/** Returns the physical address of the web server */
$SERVER_ADDRESS = $_SERVER['DOCUMENT_ROOT'];
include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/CrimeView.php";
include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/TempoView.php";
include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/NaturezaView.php";
include_once $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/CategoriaView.php";
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
