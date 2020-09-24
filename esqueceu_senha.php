<?php session_start(); ?>
<!DOCTYPE html>
<html lang ='pt-BR'>
	<head>
		<meta charset ='utf-8'/>
		<!--<script src = "cadastrar_usuario.js"></script>-->
		<title> Login - Carteirinha de vacinação digital </title>
		<script src = "jquery-3.4.1.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="estilo.css"/>
		
	</head>
	<body class='bg-info'>
			<div>
				<h1 class='bg-primary'><img src='img/logo.png' width='100px'/>  Sistema de Auxílio à Vacinação</h1>
			</div>
		<div class='container-fluid'>
			<?php //include("menu.php"); ?>		
			<div align='center' class='container-fluid'>
						<!-- LOGIN -->
						<h3>Esqueceu a senha?</h3>	
						<form method ='post' action='validacao.php'><div class='form-group'>
							<?php
								if(isset($_GET["erro"])){
									echo "<h3>Usuário e/ou senha inválidos!</h3>";
								}
							?>
							<label align='left'>Email
								<input class='form-control' type="email" name="email" placeholder="Email">
							</label >
							<div>
								<button id='btn' class='btn btn-info'>ENVIAR</button><br/>
							</div>
							<a href='cadastro.php'>Clique aqui para se cadastrar</a><br />
							<a href='index.php'>Home</a>
						</div></form>
			</div>
		</div>
	</body>
</html>