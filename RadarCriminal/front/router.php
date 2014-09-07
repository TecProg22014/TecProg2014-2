<?php
$pagina = isset( $_GET['pag'] ) ? $_GET['pag'] : null;
switch($pagina){
        case 'ano':
                include $SERVER_ADDRESS."/view/year.php";
                break;
        case 'tipo':
                include $SERVER_ADDRESS."/view/type.php";
                break;
        case 'tRA':
        		include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/totalra.php";    
        		break;
        case 'cCat':
        		include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/crimeporcat.php";
        		break;
        case 'u':
        		include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/crimeporra.php";
        		break;
        default:
                include $SERVER_ADDRESS."/TecProg2014-2/RadarCriminal/view/initial.php";     
                break;   
}