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
			
			<h1>Agendar nova dose.</h1>
			<form method = "post" action = "insere_agendamento.php"><div class='form-group'>
			
				<label align='left'>
					Vacina: <br /><select required='required' class='form-control' name = 'tipo_vacina'>
							<option value="" disabled selected>:: Vacina</option>
							<?php
								$consulta_vacina = "SELECT tipo FROM vacina";
								$resultado_vacina = mysqli_query($conexao,$consulta_vacina) or die ("ERRO");
								
								while($linha=mysqli_fetch_assoc($resultado_vacina)){
									echo '<option value = "'. $linha["tipo"] .'">'.$linha["tipo"] .'</option>';
								}
							?>
							
						</select>
				</label>
				
				<!--<label align='left'>Data Agendada:
					<input class='form-control' type='date' name='data_agendada' placeholder="data agendada">
				</label>-->
				
				<label align='left'>CPF do Paciente:
					<input required='required' class='form-control' type='text' name='cpf_paciente' placeholder="cpf do paciente"/>
				</label>
				<label align='left'>Data prevista para a aplicação:
					<input required='required' class='form-control' type='date' name='data_agendada' placeholder="Selecione a data da aplicação"/>
				</label>
				<input type="hidden" id="confirmacao" name="confirmacao" value="0"/>
				<button id='btn' class='btn btn-info'>AGENDAR</button><br/>
			</div></form>
		</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>