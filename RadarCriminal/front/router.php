<?php


$pagina = isset( $_GET['pag'] ) ? $_GET['pag'] : null;
switch($pagina){
        case 'ano':
                include "/front/year.php";
                break;
        case 'tipo':
                include "/front/type.php";
                break;
        case 'tRA':
        		include "/front/totalra.php";    
        		break;
        case 'cCat':
        		include "/front/crimeporcat.php";
        		break;
        case 'u':
        		include "/front/crimeporra.php";
        		break;
        default:
                include "/front/initial.php";     
                break;   
}