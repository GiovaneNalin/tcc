<!DOCTYPE html>
<html lang ='pt-BR'>
	<head>
		<meta charset ='utf-8'/>
		<script src = "jquery-3.4.1.min.js"></script>
		<script src = "./js/carteirinha.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="estilo.css"/>
		<div class='row container-fluid'>
			<h1 class='bg-primary'><img src='img/logo.png' width='100px'/>  Sistema de Auxílio à Vacinação</h1>
		</div>
	
	
		<?php 
			if(isset($_SESSION["autorizado"])){
		?>
			
		<div class='row container-fluid'>
				<a href="perfil.php"><img width='50px'src='img/perfil.png'></a>
			
			<?php //checar a página que o usuário fez login
					if(isset($_SESSION["autorizado"]) and $_SESSION["pagina"] == "paciente"){
							echo"<a href='home_paciente.php'>| Home |</a>
							<a href='carteirinha.php'> Carteirinha |</a>
							<a href='logout.php'> Logout |</a>";
					}
					
					if(isset($_SESSION["autorizado"]) and $_SESSION["permissao"] == 1 and $_SESSION["pagina"] == "agente"){
							echo"<a href='home_agente.php'>| Home |</a>
							<a href='cadastrar_vacinas.php'> Cadastrar vacinas |</a>
							<a href='logout.php'> Logout |</a>";
					}
					
					if(isset($_SESSION["autorizado"]) and $_SESSION["permissao"] == 2 and $_SESSION["pagina"] == "administrador"){
							echo"<a href='home_administrador.php'>| Home |</a>
							<a href='logout.php'> Logout |</a>";
					}
			}
			?>
		</div>
