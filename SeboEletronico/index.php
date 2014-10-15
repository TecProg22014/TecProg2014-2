<?php
	session_start();
	$userIdAuthentication = $_SESSION['id_usuario'];
	
	include_once "./Visao/Header.php";
	$typeOfPage = "login";
	Header::loadMenuOfPage( $typeOfPage );


?>
   
		<img src="http://localhost/TecProg2014-2/SeboEletronico/Visao/img/LogoSebo.jpg" class="img"/>
	</body>
</html>