<?php
$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

$pagina = isset( $_GET['pag'] ) ? $_GET['pag'] : null;
switch($pagina){
        case 'ano':
                include $SERVER_ADRESS."/front/year.php";
                break;
        case 'tipo':
                include $SERVER_ADRESS."/front/type.php";
                break;
        case 'tRA':
        		include $SERVER_ADRESS."/view/totalra.php";    
        		break;
        case 'cCat':
        		include $SERVER_ADRESS."/view/crimeporcat.php";
        		break;
        case 'u':
        		include $SERVER_ADRESS."/view/crimeporra.php";
        		break;
        default:
                include $SERVER_ADRESS."/view/initial.php";     
                break;   
}