<?php
	if(!isset($_SESSION["autorizado"]) and ($_SESSION["permissao"] != 1) and ($_SESSION["pagina"] != "agente")){
		header("location: index.php");
		die();
	}
?>