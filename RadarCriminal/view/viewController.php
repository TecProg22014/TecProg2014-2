<?php
$pagina = isset( $_GET['pag'] ) ? $_GET['pag'] : null;
switch($pagina){
	case 'ano':
		include "/view/year.php";
		break;
	case 'tipo':
		include "/view/type.php";
		break;
	default:
		include "/view/index.php";	
}