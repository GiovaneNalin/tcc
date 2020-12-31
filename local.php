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
		?>	
	</head>
	<body class='body_administrador'>
		<div class='container-fluid' align='center'>
			<!-- CADASTRO -->
			<h1>Cadastrar Novo Posto de Saúde.</h1>
			<form method = "post" action = "insere_local.php"><div class='form-group'>
				<label align='left'>Nome do Posto de Saúde:
					<input required='required' class='form-control' type='text' name='nome_postinho' placeholder="Nome">
				</label><br />
				<label align='left'>Endereço:<br/>
					<input required='required' class='form-control' type='text' name="endereco" placeholder='Endereço'>
				</label><br/>
				<button id='btn' class='btn btn-info'>CADASTRAR</button><br/>
			</div></form>
		</div>
		
		<div class='form-group container-fluid' align='center'>
			
			<h1>Consultar Posto de Saúde</h1>
			
				<form action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type='text' class=' form-control' name='parametro' placeholder='Consultar Posto de Saúde Pelo Nome'/>
					<input class='btn btn-info' type='submit' value='Buscar'/>
				</form><br /><br />
				
				<?php include("listar_local.php");?>
		</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>