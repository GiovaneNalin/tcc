<?php session_start(); ?>
<!DOCTYPE html>
<html lang ='pt-BR'>
	<head>
		<meta charset ='utf-8'/>
		<!--<script src = "cadastrar_usuario.js"></script>-->
		<title> Login - Carteirinha de vacinação digital </title>
		<script src = "jquery-3.4.1.min.js"></script>
		<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
		<link rel="stylesheet" href="estilo.css"/>
	</head>
	<body class='container-body'> 
		<div class='container-index'>		
			<div class='container-head'>
				<div class='titulo'>
					<img src='img/logo3.png' class='logo'/>
					<h1 class='center'>Sistema de Auxílio à Vacinação</h1> 
				</div>				
			</div>
			<div class='container col-3 bg-info'>
				<?php //include("menu.php"); ?>		
				<div align='center' class='container-fluid'>
					<h1> Logar como... </h1>
					<div>
						<a href='login_agente.php'><img src='img/agente1.png' width='200px'/></a>
						<a href='login_paciente.php'><img src='img/paciente1.png' width='200px'/></a>
						<a href='login_administrador.php'><img src='img/administrador1.png' width='200px'/></a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>