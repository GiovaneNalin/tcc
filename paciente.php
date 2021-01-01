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
		<div class='form-group container-fluid' align='center'>
			
			<h1>Consultar paciente</h1>
			
				<form action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type='text' class=' form-control' name='parametro' placeholder='Consultar Paciente pelo CPF'/>
					<input class='btn btn-info' type='submit' value='Buscar'/>
				</form><br /><br />
				
				<?php include("listar_paciente.php");?>
		</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>