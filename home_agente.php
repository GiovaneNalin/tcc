<?php session_start(); ?>
<!DOCTYPE html>
<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
		<title> SAV - HOME </title>
		<?php
			include ("menu.php");
			include("verificacao_agente.php");
			if(isset($_SESSION["autorizado"]) and $_SESSION["permissao"] == 1){			
		?>	
	</head>
	<body class='body_agente'>
		<div class='form-group container-fluid' align='center'>
			<h1>Bem vindo à plataforma!</h1>
		</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>