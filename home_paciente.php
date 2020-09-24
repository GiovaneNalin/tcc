<?php session_start(); ?>
<!DOCTYPE html>
<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
		<title> SAV - HOME</title>
		<?php
			include("verificacao_paciente.php");	
			include ("menu.php");
			if(isset($_SESSION["autorizado"]) and $_SESSION["pagina"] == "paciente"){			
		?>
	</head>
	<body class='bg-info'>
	<div>
		<div align='center'>
			<h1> Últimas Notícias </h1>
		</div>
	</div>
	
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>