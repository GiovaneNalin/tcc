<?php session_start(); ?>
<!DOCTYPE html>
<html lang ='pt-BR'>
	<head>
		<meta charset ='utf-8'/>
		<script src = "jquery-3.4.1.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="estilo.css"/>
		<style>
		</style>
	</head>
		<h1 class='logo_agente'><img src='img/logo_agente.png' width='100px'/>  Sistema de Auxílio à Vacinação</h1>
		<div align='center'>
			<?php 
				//if(isset($_SESSION["autorizado"])){ 
					echo"<a href='home_agente.php'> | Home | </a>
					<a href='logout.php'>  Logout |</a>";
				//	if($_SESSION["permissao"] == 1){
				//		echo"<a href='cadastrar_vacinas.php'> CADASTRAR VACINAS </a>";
				//	}				
			?>
			<?php
				if(isset($_SESSION["autorizado"])){
					echo "<li><a href='logout.php'>Logout|</a></li>";
				}
			?>

		</div>
</html>