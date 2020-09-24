<?php
	if(!isset($_SESSION["autorizado"]) and ($_SESSION["pagina"] != "paciente")){
		header("location: index.php");
		die();
	}
?>