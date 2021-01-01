<?php include("conexao.php");
session_start();?>
<!DOCTYPE html>
<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
		<title> SAV - HOME </title>
		<?php
			include ("menu.php");
			include("verificacao_paciente.php");	
			if(isset($_SESSION["autorizado"]) and $_SESSION["pagina"] == "paciente"){
				$cpf = filter_input(INPUT_GET, "cpf");
				$email = filter_input(INPUT_GET, "email");
		?>	
	</head>
	<body class='body_agente'>
		<div class='container-fluid' align='center'>
			<!-- CADASTRO -->
			<h1>Alterar email</h1>
			<form method = "get" action = "alteracao_email.php"><div class='form-group'>
					<input type='hidden' name='id' value='<?php echo $cpf; ?>'/>
				<label align='left'>Novo email:
					<input required='required' class='form-control' type='email' value='<?php echo $email; ?>' name='email' placeholder="Novo email">
				</label><br />
				
				<input id='btn' type='submit' value ='Alterar' class='btn btn-danger'>
				<button href ='perfil.php' id='btn' class='btn btn-info'>Cancelar</button><br/>
			</div></form>
		</div>
		
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>