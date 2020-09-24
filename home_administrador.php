<?php session_start(); ?>
<!DOCTYPE html>
<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
		<title> SAV - HOME </title>
	
	<?php
		include("verificacao_administrador.php");
		include ("menu.php");
		if(isset($_SESSION["autorizado"]) and $_SESSION["permissao"] == 2){		
	?>
	</head>
	<body class='body_administrador'>
		<div align='center'>
			<a href = "administrador_vacina.php"><img src='img/botao_vacina.png' width='200px'></a>
			<a href = "administrador_paciente.php"><img src='img/botao_paciente.png' width='200px'></a>
		</div>
	</body>
</html>
		<?php
			}else{
				echo"Você não realizou o devido login e/ou não tem acesso a essa página!";
				header("location: index.php");
			}
		?>