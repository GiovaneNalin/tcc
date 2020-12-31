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
				$id_postinho = filter_input(INPUT_GET, "id_postinho");
				$nome_postinho = filter_input(INPUT_GET, "nome_postinho");
				$endereco = filter_input(INPUT_GET, "endereco");
		?>	
	</head>
	<body class='body_administrador'>
	<div class='container-fluid' align='center'>
			<!-- CADASTRO -->
			<h1>Cadastrar Novo Posto de Saúde.</h1>
			<form method = "get" action = "alteracao_local.php"><div class='form-group'>
				<input type='hidden' name='id_postinho' value='<?php echo $id_postinho; ?>'/>
				<label align='left'>Nome do Posto de Saúde:
					<input required='required' class='form-control' type='text'  value = '<?php echo $nome_postinho ?>' name='nome_postinho' placeholder="Nome">
				</label><br />
				<label align='left'>Endereço:<br/>
					<input required='required' class='form-control' type='text' value = '<?php echo $endereco ?>' name="endereco" placeholder='Endereço'>
				</label><br/>
				<input id='btn' type='submit' value ='Alterar' class='btn btn-danger'>
				<button href ='local.php' id='btn' class='btn btn-info'>Cancelar</button><br/>
			</div></form>
		</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>