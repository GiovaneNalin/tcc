<?php include("conexao.php");
session_start();?>
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
			<h1>Aplicar nova dose.</h1>
			<form method = "post" action = "insere_dose.php"><div class='form-group'>
			
				<label align='left'>
					Vacina e Lote correspondente: <br /><select required='required' class='form-control' name = 'lote'>
							<option value="" disabled selected>:: Vacina | Lote</option>
							<?php
								$consulta_lote = "SELECT * FROM lote";
								$resultado_lote = mysqli_query($conexao,$consulta_lote) or die ("ERRO");							
								while($linha=mysqli_fetch_assoc($resultado_lote)){
									echo '<option value = "'. $linha["id"] .'">'. $linha["tipo_vacina"]." | ". $linha["id"].'</option>';
								}
							?>
							
						</select>
				</label>
				
				<!--<label align='left'>Data Agendada:
					<input class='form-control' type='date' name='data_agendada' placeholder="data agendada">
				</label>-->
				
				<label align='left'>Local:
					<select class='form-control' name = 'local'>					
						<option value="" disabled selected>:: Local </option>	
							<?php
								$consulta_local = "SELECT * FROM local";
								$resultado_local = mysqli_query($conexao,$consulta_local) or die ("ERRO");
								
								while($linha=mysqli_fetch_assoc($resultado_local)){
									echo '<option value = "'. $linha["id_postinho"] .'">'.$linha["nome"] .'</option>';
								}
							?>
					</select>
				</label>
				
				<label align='left'>CPF do Paciente:
					<input required='required' class='form-control' type='text' name='cpf_paciente' placeholder="cpf do paciente">
				</label>
				<button id='btn' class='btn btn-info'>CADASTRAR</button><br/>
			</div></form>
		</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>