<?php
/** Returns the physical address of the web server */
$SERVER_ADDRESS = $_SERVER['DOCUMENT_ROOT']; 
include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/RegiaoAdministrativaView.php";
include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/CategoriaView.php";
$RAVW = new RegiaoAdministrativaView();
$categoriaVW = new CategoriaView();

$contRA = $RAVW->contarRegistrosRA();
$contCategoria = $categoriaVW->contarRegistros();
?>
<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="index.php"><i class="icon-home"></i><span class="hidden-tablet"> Pagina Inicial</span></a></li>
						<li><a href="?pag=tRA"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Ocorrencias por R.A.</span></a></li>	
						<li>
							<a class="dropmenu" href="#" alt="Por Natureza" title="Por Natureza"><i class="icon-globe"></i><span class="hidden-tablet"> Crimes</span> <span class="label"><?php echo $contCategoria; ?></span></a>
							<ul>
						

								<?php //echo "<li><a class=\"submenu\" href=\"crimeporcat.php\"><i class=\"icon-inbox\"></i><span class=\"hidden-tablet\">aa</span></a></li>";
							    	echo utf8_encode($categoriaVW->listarTodasAlfabicamente());
								?>
							</ul>
						</li>
						<li>
							<a class="dropmenu" href="#" alt="Região Administrativa" title="Região Administrativa"><i class="icon-move"></i><span class="hidden-tablet"> Cidades <span class="label"><?php echo $contRA;  ?></span></a>
							<ul>
								<!--<span class="label"></span> -->
								<?php 
									echo utf8_encode($RAVW->listarTodasAlfabeticamente());
								?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->