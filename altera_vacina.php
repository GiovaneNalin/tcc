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
				$tipo = filter_input(INPUT_GET, "tipo");
				$descricao = filter_input(INPUT_GET, "descricao");
		?>	
	</head>
	<body class='body_agente'>
		<div class='container-fluid' align='center'>
			<!-- CADASTRO -->
			<h1>Alterar vacina.</h1>
			<form method = "post" action = "alteracao_vacina.php"><div class='form-group'>
				<label align='left'>Tipo de vacina:
					<input required='required' class='form-control' type='text' value = '<?php echo $tipo ?>' name='tipo' placeholder="Nome">
				</label><br />
				<label align='left'>Descrição:<br/>
					<textarea required='required' class='form-control' value = '<?php echo $descricao ?>' name="descricao" rows="10" cols="30"> </textarea>
				</label><br/>
				<input id='btn' type='submit' value ='Alterar' class='btn btn-info'><br/>
			</div></form>
		</div>
	
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>