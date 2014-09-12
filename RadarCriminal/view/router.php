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
        		include "/view/totalra.php";    
        		break;
        case 'cCat':
        		include "/view/crimeporcat.php";
        		break;
        case 'u':
        		include "/view/crimeporra.php";
        		break;
        default:
                include "/view/initial.php";     
                break;   
}