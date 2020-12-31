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
			<div align='center' class='container-fluid'>
				<h1> Gerenciar: </h1>
				<div class='row container-fluid'>
					<a class='col-lg-6 col-sm-12' href='paciente.php'><img src='img/usuarios.png' width='300px'/></a>
					<a class='col-lg-6 col-sm-12' href='local.php'><img src='img/postos.png' width='300px'/></a>
				</div>
			</div>
		</div>
	</body>
</html>
		<?php
			}else{
				echo"Você não realizou o devido login e/ou não tem acesso a essa página!";
				header("location: index.php");
			}
		?>