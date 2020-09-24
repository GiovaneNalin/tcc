<!DOCTYPE html>
<html lang ='pt-BR'>
	<head>
		<meta charset ='utf-8'/>
		<!--<script src = "cadastrar_usuario.js"></script>-->
		<title> Login - Carteirinha de vacinação digital </title>
		<script src = "jquery-3.4.1.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="estilo.css"/>
		<?php include("menu.php"); ?>	
	</head>
	<body class='body_agente'>
			<!--<div class="">
				<h1 class='logo_agente'><img src='img/logo_agente.png' width='100px'/>  Sistema de Auxílio à Vacinação</h1>
			</div>-->
		<div class='container-fluid'>	
			<div align='center' class='container-fluid'>
						<!-- LOGIN -->
						<h3>Login para Agentes de Saúde</h3>	
						<form method ='post' action='validacao.php'><div class='form-group'>
							<?php
								if(isset($_GET["erro"])){
									echo "<h3>Usuário e/ou senha inválidos!</h3>";
								}
							?>
							<label align='left'>CPF
								<input class=' form-control' maxlength='11' type="number" name="cpf" placeholder="CPF">
							</label>
							<br />
							<label align='left'>Senha
								<input class='form-control' maxlength='6' type="password" name="senha" placeholder="Senha">
							</label >
								<input type="hidden" name="pagina" value="agente"/>
							<div>
								<button id='btn' class='btn btn-info'>LOGIN</button><br/>
							</div>
							<a href='cadastro.php'>Clique aqui para se cadastrar</a><br />
							<a href='esqueceu_senha.php'>Esqueceu a senha?</a><br />
							<a href='index.php'>Não é agente de saúde? Clique aqui e selecione outra forma de login.</a>
						</div></form>
			</div>
		</div>
	</body>
</html>