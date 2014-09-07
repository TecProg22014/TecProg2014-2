<?php
$pagina = isset( $_GET['pag'] ) ? $_GET['pag'] : null;
switch($pagina){
	case 'ano':
		include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/year.php";
		break;
	case 'tipo':
		include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/type.php";
		break;
	default:
		include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/index.php";	
}