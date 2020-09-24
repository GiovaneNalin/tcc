<?php
	if(!isset($_SESSION["autorizado"]) and ($_SESSION["permissao"] != 2) and ($_SESSION["pagina"] != "administrador")){
		header("location: index.php");
		die();
	}
?>