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
				$cpf = filter_input(INPUT_GET, "cpf");
				$nome = filter_input(INPUT_GET, "nome");
				$email= filter_input(INPUT_GET, "email");
				$data_nascimento = filter_input(INPUT_GET, "data_nascimento");
				$sexo= filter_input(INPUT_GET, "sexo");
				$gestante = filter_input(INPUT_GET, "gestante");
				$cpf_responsavel = filter_input(INPUT_GET, "cpf_responsavel");
				$endereco = filter_input(INPUT_GET, "endereco");
				$permissao = filter_input(INPUT_GET, "permissao");
				$senha = filter_input(INPUT_GET, "senha");
				$telefone = filter_input(INPUT_GET, "telefone");
				$cpf_antigo = $cpf;
		?>	
	</head>
	<body class='body_administrador'>
		<div class='container-fluid' align='center'>
			<!-- CADASTRO -->
			<h1>Alterar paciente.</h1>
			<form method = "get" action = "alteracao_paciente.php"><div class='form-group'>
						<input type='hidden' name='cpf_antigo' value='<?php echo $cpf_antigo; ?>'/>
						<label align='left'>CPF
							<input required='required' class='form-control' value='<?php echo $cpf; ?> maxlength='11' type="number" name="cpf" placeholder="CPF">
						</label>
						<label align='left'>CPF responsável 
							<input required='required' class='form-control' value='<?php echo $cpf_responsavel; ?>' maxlength='11' type="number" name="cpf_responsavel" placeholder="CPF">
						</label>
						<label align='left'>Nome
							<input required='required' class='form-control' value='<?php echo $nome; ?>' type='text' name='nome' placeholder="Nome">
						</label><br />
						<p>*Telefone deve conter o DDD seguido do número. </p>
						<label align='left'>Telefone
							<input required='required' class='form-control' value='<?php echo $telefone; ?>' type='number' name="telefone" placeholder="(xx) xxxx-xxxx">
						</label>
						<label align='left'>E-mail
							<input required='required' class='form-control' value='<?php echo $email; ?>' type="email" name="email" placeholder="E-mail">
						</label><br />
						<label align='left'>Endereço
							<input required='required' class='form-control' value='<?php echo $endereco; ?>' type="text" name="endereco" placeholder="endereco">
						</label><br />
						<label align='left'>Senha
							<input required='required' class='form-control' value='<?php echo $senha; ?>' maxlength='6' type="password" name="senha" placeholder="Senha">
						</label>
						<label align='left'>Confirmar Senha
							<input required='required' class='form-control' value='<?php echo $senha; ?>' maxlength='6' type="password" name="confirmar_senha" placeholder="Confirmar Senha">
						</label><br/>
						<p>*A senha deve conter 6 dígitos. </p>
						<p>*Pode conter caracteres especiais, letras e números. </p>
						<label align='left'>Data de nascimento
							<input required='required' class='form-control' value='<?php echo $data_nascimento; ?>' type="date" name="data_nascimento">
						</label>
						<div class='form-check form-check-inline radio-image'>
						<label class=''>Sexo:<br />
							<label for='m'>
								<input required='required' class='form-check-input' type="radio" name="sexo" value="masculino" id='m'/>
								<img src='img/male.png' class='img'>
							</label>
							<label for='f'>
								<input required='required' class='form-check-input' type="radio" name="sexo" value="feminino" id='f'/>
								<img src='img/female.png' class='img'>
							</label>
						</label>
						</div>											
						<input id='btn' type='submit' value ='Alterar' class='btn btn-danger'/>
						<button href ='paciente.php' id='btn' class='btn btn-info'>Cancelar</button><br/>
					</div></form>
		</div>
	
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>