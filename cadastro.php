<?php session_start(); ?>
<!DOCTYPE html>
<html lang ='pt-BR'>
	<head>
		<meta charset ='utf-8'/>
		<!--<script src = "cadastrar_usuario.js"></script>-->
		<title> Index - Carteirinha de vacinação digital </title>
		<script src = "jquery-3.4.1.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="estilo.css"/>
		<style>
			.radio-image label > input{
				visibility: hidden;
			}
			.radio-image label > input + img{
				cursor:pointer;
				border:4px solid #EEE;
				border-radius:15px;
				padding:10px;
			}
			.radio-image label > input:checked + img{
				border:4px solid #3F51B5;
			}
			.img{
				width: 100px;
			}
		</style>
	</head>
	<body class='bg-info'>
		<div class="">
				<h1 class='bg-primary'><img src='img/logo.png' width='100px'/>  Sistema de Auxílio à Vacinação</h1>
		</div>
	<div class='container-fluid'>	
		<div align='center'>
					<!-- CADASTRO -->
					<h3>CRIAR UMA CONTA.</h3>
					<form method = "post" action = "insere_usuario.php"><div class='form-group'>
						<label align='left'>CPF
							<input class='form-control' maxlength='11' type="number" name="cpf" placeholder="CPF">
						</label>
						<label align='left'>CPF responsável 
							<input class='form-control' maxlength='11' type="number" name="cpf_responsavel" placeholder="CPF">
						</label>
						<label align='left'>Nome
							<input class='form-control' type='text' name='nome' placeholder="Nome">
						</label><br />
						<label align='left'>Telefone
							<input class='form-control' type='number' name="telefone" placeholder="(xx) xxxx-xxxx">
						</label>
						<label align='left'>E-mail
							<input class='form-control' type="email" name="email" placeholder="E-mail">
						</label><br />
						<label align='left'>Endereço
							<input class='form-control' type="text" name="endereco" placeholder="endereco">
						</label><br />
						<p>*Telefone deve conter DDD seguido do número. </p>
						<label align='left'>Senha
							<input class='form-control' maxlength='6' type="password" name="senha" placeholder="Senha">
						</label>
						<label align='left'>Confirmar Senha
							<input class='form-control' maxlength='6' type="password" name="confirmar_senha" placeholder="Confirmar Senha">
						</label><br/>
						<p>*A senha deve conter 6 dígitos. </p>
						<p>*Pode conter caracteres especiais, letras e números. </p>
						<label align='left'>Data de nascimento
							<input class='form-control' type="date" name="data_nascimento">
						</label>
						<div class='form-check form-check-inline radio-image'>
						<label class=''>Sexo:<br />
							<label for='m'>
								<input class='form-check-input' type="radio" name="sexo" value="m" id='m'/>
								<img src='img/male.png' class='img'>
							</label>
							<label for='f'>
								<input class='form-check-input' type="radio" name="sexo" value="f" id='f'/>
								<img src='img/female.png' class='img'>
							</label>
						</label>
						</div>
						<label class=''>Gestante?:<br />
							<label for='s'> Sim
								<input class='form-check-input' type="radio" name="gestante" value="s" id='s'/>
							</label>
							<label for='n'> Não
								<input class='form-check-input' type="radio" name="gestante" value="n" id='n'/>
							</label>
						</label><br/>
						
						<label align='left'>Selecione um meio para alertas:<br/>
							Whatsapp<input type = 'checkbox' name='alerta' value='1'/>
							E-mail<input type = 'checkbox' name='alerta' value='2'/>
						</label><br/>
						
						<!--<fieldset class="radio-image">
							<label for="M">
								<input type="checkbox" name="sexo" id="w" value="w">
								<img src="img/wpp.png" alt="Masculino">
							</label>
							<label for="F">
								<input type="checkbox" name="sexo" id="e" value="e">
								<img src="img/email.png" alt="Feminino">
							</label>
						</fieldset>-->
						<button id='btn' class='btn btn-info'>CADASTRAR</button><br/>
						<a href='index.php'>Já é cadastrado?</a>
					</div></form>
		</div>
	</div>
</html>