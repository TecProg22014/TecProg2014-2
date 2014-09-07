<?php
/** Returns the physical address of the web server */
$SERVER_ADDRESS = $_SERVER['DOCUMENT_ROOT'];
$pagina = isset( $_GET['pag'] ) ? $_GET['pag'] : null;
switch($pagina){
        case 'ano':
                include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/front/year.php";
                break;
        case 'tipo':
                include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/front/type.php";
                break;
        case 'tRA':
        		include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/front/totalra.php";    
        		break;
        case 'cCat':
        		include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/front/crimeporcat.php";
        		break;
        case 'u':
        		include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/front/crimeporra.php";
        		break;
        default:
                include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/front/initial.php";     
                break;   
}