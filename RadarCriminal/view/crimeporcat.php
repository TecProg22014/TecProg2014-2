<?php 


include_once "/view/CrimeView.php";
include_once "/view/TempoView.php";
include_once "/view/NaturezaView.php";
include_once "/view/CategoriaView.php";
$crimeVW = new CrimeView();
$timeVW = new TempoView();
$natureVW = new NaturezaView();
$categoryVW = new CategoriaView();
$categoryId = isset( $_GET['id'] ) ? $_GET['id'] : null;

?>
<!-- start: Content -->
<div id="content" class="span10">

	<?php 
	$tr = $naturezaVW->generateSideBar($categoryId);
	for($i=0;$i<count($tr);$i++){
		echo utf8_encode($tr[$i]);
	}
	?>

</div>
<!-- end: Content -->

</div>
<!--/fluid-row-->
