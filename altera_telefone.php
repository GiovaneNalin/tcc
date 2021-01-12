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
				$telefone = filter_input(INPUT_GET, "telefone");
		?>	
	</head>
	<body class='body_agente'>
		<div class='container-fluid' align='center'>
			<!-- CADASTRO -->
			<h1>Alterar telefone</h1>
			<form method = "get" action = "alteracao_telefone.php"><div class='form-group'>
					<input type='hidden' name='id' value='<?php echo $cpf; ?>'/>
				<label align='left'>Novo número:
					<input required='required' class='form-control' type='number' value='<?php echo $telefone; ?>' name='telefone' placeholder="Novo telefone">
				</label><br />
				
				<input id='btn' type='submit' value ='Alterar' class='btn btn-danger'>				
			</div></form><a href ='perfil.php'><button id='btn' class='btn btn-info'>Cancelar</button></a><br/>
		</div>
		
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>