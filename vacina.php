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