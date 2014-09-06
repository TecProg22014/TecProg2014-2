<?php 
include_once('./views/CrimeView.php');
include_once('./views/TempoView.php');
include_once('./views/NaturezaView.php');
include_once('./views/CategoriaView.php');
$crimeVW = new CrimeView();
$tempoVW = new TempoView();
$naturezaVW = new NaturezaView();
$categoriaVW = new CategoriaView();
$idCategoria = isset( $_GET['id'] ) ? $_GET['id'] : null;


//$arrayCategorias = $categoriaVW->listarTodasAlfabeticamentePuro();
//$auxCategoria = $arrayCategorias[$idCategoria];
//$auxNatureza = $naturezaVW->consultarPorIdCategoria($auxCategoria->__getIdCategoria());
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
