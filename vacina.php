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
			<h1>Consultar vacina</h1>
			
				<label align='left'>
					<input type='text' class=' form-control' name='consulta' placeholder='Consultar Vacina'/>
				</label>
				
				<span id="conteudo"></span>
				<script>
					$(document).ready(function () {
						$.post('listar_vacina.php', function(retorna){
							//Subtitui o valor no seletor id="conteudo"
							$("#conteudo").html(retorna);
						});
					});
				</script>
		</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>