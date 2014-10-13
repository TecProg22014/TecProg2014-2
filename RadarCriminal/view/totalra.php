<?php
	$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";
	
   	include_once $SERVER_ADRESS."/view/CrimeView.php";
   	include_once $SERVER_ADRESS."/view/TempoView.php";
   	$crimeVW = new CrimeView();
   	$timeVW = new TempoView(); 
  ?>
  
<div id="content" class="span10">

	<!-- MAPA DO DF -->
	<div class="row-fluid">
		<style>
			path {transition: .6s fill; fill: #D3D3D3;}
			path:hover {fill: #22aa22;}
		</style>
		<div class="box span12" style="margin-left: 0;">
			<div class="box-header">
				<h2><a href="#" class="btn-minimize"><i class="icon-map-marker"></i>Mapa do Distrito Federal</a></h2>
				<div class="box-icon">
					<a href="#" class="btn-close"><i class="icon-remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<div style="margin: 0 auto;">
					<embed src='./front/img/regioes_administrativa.svg'/>
				</div>
			</div>
		</div>
	</div>
	<!-- /MAPA DO DF -->

	<div class="row-fluid">

		<div class="box span12">
			<div class="box-header">
				<h2><a href="#" class="btn-minimize"><i class="icon-tasks"></i>Total de Crimes por R.A.</a></h2>
				<div class="box-icon">
					<a href="#" class="btn-close"><i class="icon-remove"></i></a>
				</div>
			</div>
			<div class="box-content" style="display: none;">
				<h3>Brasilia</h3>
					<div class="progress progress-success" title="93%">
						<div class="bar" style="width: 93%;"></div>
					</div>

				<h3>Ceilândia</h3>
					<div class="progress progress-success" title="84%">
						<div class="bar" style="width: 84%;"></div>
					</div>
				<h3>Taguatinga</h3>
					<div class="progress progress-success" title="81%">
						<div class="bar" style="width: 81%;"></div>
					</div>

				<h3>Samambaia</h3>
					<div class="progress progress-success" title="40%">
						<div class="bar" style="width: 40%;"></div>
					</div>
				<h3>Planaltina</h3>
					<div class="progress progress-success" title="39%">
						<div class="bar" style="width: 39%;"></div>
					</div>

				<h3>Gama</h3>
					<div class="progress progress-success" title="37%">
						<div class="bar" style="width: 37%;"></div>
					</div>
				<h3>Santa Maria</h3>
					<div class="progress progress-success" title="34%">
						<div class="bar" style="width: 34%;"></div>
					</div>

				<h3>Guará</h3>
					<div class="progress progress-success" title="31%">
						<div class="bar" style="width: 31%;"></div>
					</div>
				<h3>Recanto das Emas</h3>
					<div class="progress progress-success" title="30%">
						<div class="bar" style="width: 30%;"></div>
					</div>

				<h3>Sobradinho</h3>
					<div class="progress progress-success" title="26%">
						<div class="bar" style="width: 26%;"></div>
					</div>
				<h3>São Sebastião</h3>
					<div class="progress progress-success" title="21%">
						<div class="bar" style="width: 21%;"></div>
					</div>

				<h3>Núcleo Bandeirante</h3>
					<div class="progress progress-success" title="19%">
						<div class="bar" style="width: 19%;"></div>
					</div>
				<h3>Paranoá</h3>
					<div class="progress progress-success" title="18%">
						<div class="bar" style="width: 18%;"></div>
					</div>

				<h3>Lago Sul</h3>
					<div class="progress progress-success" title="15%">
						<div class="bar" style="width: 15%;"></div>
					</div>
				<h3>Riacho Fundo</h3>
					<div class="progress progress-success" title="13%">
						<div class="bar" style="width: 13%;"></div>
					</div>

				<h3>Brazlândia</h3>
					<div class="progress progress-success" title="11%">
						<div class="bar" style="width: 11%;"></div>
					</div>
				<h3>Lago Norte</h3>
					<div class="progress progress-success" title="8%">
						<div class="bar" style="width: 8%;"></div>
					</div>

				<h3>Cruzeiro</h3>
					<div class="progress progress-success" title="7%">
						<div class="bar" style="width: 7%;"></div>
					</div>
				<h3>Candangolândia</h3>
					<div class="progress progress-success" title="5%">
						<div class="bar" style="width: 5%;"></div>
					</div>
			</div>
		</div><!--/span-->

	</div>

</div>
<!-- end: Content -->

</div>
<!--/fluid-row-->
