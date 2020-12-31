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
				$id = filter_input(INPUT_GET, "id");
				$tipo_vacina = filter_input(INPUT_GET, "tipo_vacina");
				$fabricante = filter_input(INPUT_GET, "fabricante");
				$origem = filter_input(INPUT_GET, "origem");
				$destino = filter_input(INPUT_GET, "destino");
				$data_fabricacao = filter_input(INPUT_GET, "data_fabricacao");
				$data_validade = filter_input(INPUT_GET, "data_validade");
		?>	
	</head>
	<body class='body_agente'>
		<div class='container-fluid' align='center'>
			<!-- CADASTRO -->
			<h1>Inserir novo lote.</h1>
			<form method = "get" action = "alteracao_lote.php"><div class='form-group'>
					<input type='hidden' name='id' value='<?php echo $id; ?>'/>
				<label align='left'>Vacina do Lote:
					<select class='form-control' name = 'tipo_vacina'>					
						<option value='<?php echo $tipo_vacina; ?>'>:: Vacina </option>	
							<?php
								$consulta_vacina = "SELECT * FROM vacina";
								$resultado_vacina = mysqli_query($conexao,$consulta_vacina) or die ("ERRO");
								
								while($linha=mysqli_fetch_assoc($resultado_vacina)){
									echo '<option value = "'. $linha["id_vacina"] .'">'.$linha["tipo"] .'</option>';
								}
							?>
					</select>
				</label><br />
				<label align='left'>Fabricante:
					<input required='required' class='form-control' type='text' value='<?php echo $fabricante; ?>' name='fabricante' placeholder="Fabricante">
				</label><br />
				<label align='left'>País de Origem:
					<input required='required' class='form-control' type='text' value='<?php echo $origem; ?>' name='origem' placeholder="Origem">
				</label>
				<label align='left'>País de Destino:
					<input required='required' class='form-control' type='text' value='<?php echo $destino; ?>' name='destino' placeholder="Destino">
				</label><br />
				<label align='left'>Data de Fabricação:
					<input required='required' class='form-control' type='date' value='<?php echo $data_fabricacao; ?>' name='data_fabricacao' placeholder="Data de fabricacao">
				</label>
				<label align='left'>Data de Validade:
					<input required='required' class='form-control' type='date' value='<?php echo $data_validade; ?>' name='data_validade' placeholder="Data de validade">
				</label><br />
				
				<input id='btn' type='submit' value ='Alterar' class='btn btn-danger'>
				<button href ='lote.php' id='btn' class='btn btn-info'>Cancelar</button><br/>
			</div></form>
		</div>
		
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>