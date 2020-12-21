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
		<div class='form-group container-fluid' align='center'>
			<h1>Consultar paciente</h1>
			
				<form action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type='number' class=' form-control' name='parametro' placeholder='Consultar Paciente pelo CPF'/>
					<input type='submit' value='Buscar'/>
				</form>
				
				<?php include("listar_carteirinha.php");?>
		</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>