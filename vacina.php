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
		?>	
	</head>
	<body class='body_agente'>
		<div class='container-fluid' align='center'>
			<!-- CADASTRO -->
			<h1>Inserir nova vacina.</h1>
			<form method = "post" action = "insere_vacina.php"><div class='form-group'>
				<label align='left'>Tipo de vacina:
					<input required='required' class='form-control' type='text' name='tipo' placeholder="Nome">
				</label><br />
				<label align='left'>Descrição:<br/>
					<textarea required='required' class='form-control' name="descricao" rows="10" cols="30"> </textarea>
				</label><br/>
				<button id='btn' class='btn btn-info'>CADASTRAR</button><br/>
			</div></form>
		</div>
		
		<div class='form-group container-fluid' align='center'>
			
			<h1>Consultar vacina</h1>
			
				<form action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type='text' class=' form-control' name='parametro' placeholder='Consultar Vacina'/>
					<input type='submit' value='Buscar'/>
				</form>
				
				<?php include("listar_vacina.php");?>
		</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>