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
			<div align='center' class='container-fluid'>
				<h1> Acessar: </h1>
				<div class='row container-fluid'>
					<a class='col-lg-4 col-sm-12' href='consulta_paciente.php'><img src='img/pacientes.png' width='300px'/></a>
					<a class='col-lg-4 col-sm-12' href='vacina.php'><img src='img/vacinas.png' width='300px'/></a>
					<a class='col-lg-4 col-sm-12' href='dose.php'><img src='img/doses.png' width='300px'/></a>
				</div>
				<div class='row container-fluid'>
					<a class='col-lg-4 col-sm-12' href='agenda_dose.php'><img src='img/agendamentos.png' width='300px'/></a>
					<a class='col-lg-4 col-sm-12' href='lote.php'><img src='img/lotes.png' width='300px'/></a>
					<a class='col-lg-4 col-sm-12' href='cadastro.php'><img src='img/cadastros.png' width='300px'/></a>
				</div>
			</div>
		</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>