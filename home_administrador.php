<?php session_start(); ?>
<!DOCTYPE html>
<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
		<title> SAV - HOME </title>
	
	<?php
		include ("menu.php");
		include("verificacao_administrador.php");
		if(isset($_SESSION["autorizado"]) and $_SESSION["permissao"] == 2){		
	?>
	</head>
	<body class='body_administrador'>
		<div class='form-group container-fluid' align='center'>
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