<?php
$pagina = isset( $_GET['pag'] ) ? $_GET['pag'] : null;
switch($pagina){
	case 'ano':
		include('C:/xampp/htdocs/mds2013/view/year.php');
		break;
	case 'tipo':
		include('C:/xampp/htdocs/mds2013/view/type.php');
		break;
	default:
		include('./view/index.php');	
}