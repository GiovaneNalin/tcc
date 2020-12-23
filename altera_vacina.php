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
				$id_vacina = filter_input(INPUT_GET, "id_vacina");
				$tipo = filter_input(INPUT_GET, "tipo");
				$descricao = filter_input(INPUT_GET, "descricao");
		?>	
	</head>
	<body class='body_agente'>
		<div class='container-fluid' align='center'>
			<!-- CADASTRO -->
			<h1>Alterar vacina.</h1>
			<form method = "get" action = "alteracao_vacina.php"><div class='form-group'>
					<input type='hidden' name='id_vacina' value='<?php echo $id_vacina; ?>'/>
				<label align='left'>Tipo de vacina:
					<input required='required' class='form-control' type='text' value = '<?php echo $tipo ?>' name='tipo' placeholder="Nome">
				</label><br />
				<label align='left'>Descrição:<br/>
					<input required='required' class='form-control' value = '<?php echo $descricao ?>' name="descricao"/> 
				</label><br/>
				<input id='btn' type='submit' value ='Alterar' class='btn btn-info'>
				<button href ='vacina.php' id='btn' class='btn btn-info'>Cancelar</button><br/>
			</div></form>
		</div>
	
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>