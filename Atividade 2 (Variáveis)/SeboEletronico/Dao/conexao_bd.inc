<?php
$connect = mysql_connect"localhost", "root", "";
if!$connect
	die "<h1>Falha na Conex&atilde;o </h1>";
}
else
	$bd = mysql_select_db "sebo eletronico";
}
?>