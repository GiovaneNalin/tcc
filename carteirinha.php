<?php session_start();
	include("conexao.php");
	include ("menu.php");
	include("verificacao_paciente.php");	
	if(isset($_SESSION["autorizado"]) and $_SESSION["pagina"] == "paciente"){

	$cpf = $_SESSION["autorizado"];
	$consulta = "SELECT d.lote, 
						d.data_tomada, 
						d.data_agendada, 
						d.local, 
						d.aplicador,
						d.confirmacao, 
						l.tipo_vacina 
				FROM dose d
				INNER JOIN lote l
				ON d.lote = l.id
				INNER JOIN vacina v
				ON l.tipo_vacina = v.tipo
				WHERE cpf_paciente = '$cpf'";
	$con = mysqli_query($conexao, $consulta) or die ($mysqli->error);
	
	$consulta_dependente = "SELECT
								d.lote,
								d.data_tomada,
								d.data_agendada,
								d.local,
								d.aplicador,
								d.confirmacao,
								l.tipo_vacina,
								p.nome,
								p.cpf
							FROM paciente p
							INNER JOIN dose d ON
							p.cpf = d.cpf_paciente
							INNER JOIN lote l ON
								d.lote = l.id
							INNER JOIN vacina v ON
								l.tipo_vacina = v.tipo
							WHERE
								p.cpf_responsavel = '$cpf'";
	$con_dependente = mysqli_query($conexao, $consulta_dependente) or die ($mysqli->error);
?>
	</head>
	<body class='bg-info'>
	<div >
		
		<div class='container-fluid'>
			<h1><b> Sua carteirinha </b></h1>
				<ul>
					<div><!-- a div se manterá oculta até clicar no nome do dono da carteirinha -->
					<input type ='text' name='nome_vacina' placeholder='Pesquisar vacina por nome:'/>
					<button class ='btn btn-info'> Filtrar </button><br />
					<button class ='btn btn-warning'> Próximas vacinas </button><br />
					
						<table class='table table-hover'>
							<thead>
								<tr> 
									<th><b>Dose</b></th> 
									<th><b>Lote</b></th>
									<th><b>Data aplicada</b></th>
									<th><b>Data agendada</b></th>
									<th><b>Local</b></th>
									<th><b>Rubrica</b></th>
								</tr>
							</thead>
							<tbody>
							<?php while($row_carteirinha = mysqli_fetch_assoc($con)){ ?>
								<tr class='table-success'>  
									<td><?php echo $row_carteirinha["tipo_vacina"] ?></td> 
									<td><?php echo $row_carteirinha["lote"] ?></td> 
									<td><?php echo $row_carteirinha["data_tomada"] ?></td> 
									<td><?php echo $row_carteirinha["data_agendada"] ?></td> 
									<td><?php echo $row_carteirinha["local"] ?></td> 
									<td><?php echo $row_carteirinha["aplicador"] ?></td> 
								</tr>
							<?php }?>
							</tbody>
						</table>
					</div>
				</ul>
				
				
			<h1><b> Dependentes </b></h1>			
				<ul>
					<ul>
						<div><!-- a div se manterá oculta até clicar no nome do dono da carteirinha -->
						<input type ='text' name='nome_vacina' placeholder='Pesquisar vacina por nome:'/>
						<button class ='btn btn-info'> Filtrar </button><br />
						<button class ='btn btn-warning'> Próximas vacinas </button><br />
						
						<?php while($row_carteirinha = mysqli_fetch_assoc($con_dependente)){?>
							<table class='table table-hover'>
								<thead>
									<tr> 
										<th><b>Dose</b></th> 
										<th><b>Lote</b></th>
										<th><b>Data aplicada</b></th>
										<th><b>Data agendada</b></th>
										<th><b>Local</b></th>
										<th><b>Rubrica</b></th>
									</tr>
								</thead>
								<tbody>
								
									<tr class='table-success'>  
										<td><?php echo $row_carteirinha["tipo_vacina"] ?></td> 
										<td><?php echo $row_carteirinha["lote"] ?></td> 
										<td><?php echo $row_carteirinha["data_tomada"] ?></td> 
										<td><?php echo $row_carteirinha["data_agendada"] ?></td> 
										<td><?php echo $row_carteirinha["local"] ?></td> 
										<td><?php echo $row_carteirinha["aplicador"] ?></td> 
									</tr>
								
								</tbody>
							</table><?php }?>
						</div>
					</ul>
				</ul>
		</div>
	</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>