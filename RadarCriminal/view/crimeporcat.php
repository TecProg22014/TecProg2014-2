<?php 
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

include_once $SERVER_ADRESS."/view/CrimeView.php";
include_once $SERVER_ADRESS."/view/TempoView.php";
include_once $SERVER_ADRESS."/view/NaturezaView.php";
include_once $SERVER_ADRESS."/view/CategoriaView.php";
$crimeVW = new CrimeView();
$timeVW = new TempoView();
$natureVW = new NaturezaView();
$categoryVW = new CategoriaView();
$categoryId = isset( $_GET['id'] ) ? $_GET['id'] : null;

?>
<!-- start: Content -->
<div id="content" class="span10">

	<?php 
	$tr = $natureVW->generateSideBar($categoryId);
	for($i=0;$i<count($tr);$i++){
		echo utf8_encode($tr[$i]);
	}
	?>

</div>
<!-- end: Content -->

</div>
<!--/fluid-row-->
