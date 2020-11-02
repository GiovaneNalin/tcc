<?php session_start();
	include ("menu.php");
	include("verificacao_paciente.php");	
	if(isset($_SESSION["autorizado"]) and $_SESSION["pagina"] == "paciente"){

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
					
						<table id = "carteirinha" class='table table-hover'>
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
								<tr id = "carteirinha">

								</tr>
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
						
						<div id = "container-dependentes">
							
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