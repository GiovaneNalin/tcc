<!DOCTYPE html>
<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
		<title> Carteirinhas - Carteirinha de vacinação digital </title>
		<?php
			include("verificacao_paciente.php");	
			include ("menu.php");
			if(isset($_SESSION["autorizado"]) and $_SESSION["pagina"] == "paciente"){
		?>
	</head>
	<body class='bg-info'>
	<div >
		
		<div class='container-fluid'>
			<h1><b> Sua carteirinha </b></h1>
				<ul>
					<button class ='btn btn-primary'><h3> Zé Gotinha </h3></button><br /><br />
					<div><!-- a div se manterá oculta até clicar no nome do dono da carteirinha -->
					<input type ='text' name='nome_vacina' placeholder='Pesquisar vacina por nome:'/>
					<button class ='btn btn-info'> Filtrar </button><br />
					<button class ='btn btn-warning'> Próximas vacinas </button><br />
					
						<table class='table table-hover'>
							<thead>
								<tr> <th><b>Vacina</b></th> <th><b>Quando tomar?</b></th> <th><b>Data da vacina</b></th> <th><b>Local</b></th> <th><b>Lote</b></th></tr>
							</thead>
							<tbody>
								<tr class='table-success'>  <td>BGC</td> <td>Ao nascer</td> <td>31-08-1986</td> <td>Postinho de Gotinhalândia</td> <td>ABC-123</td></tr>
								<tr>  <td>Hepatite B</td> <td>Ao nascer</td> <td>NÃO TOMOU</td> <td>NÃO TOMOU</td> <td>NÃO TOMOU</td></tr>
							</tbody>
						</table>
						
					</div>
				</ul>
			<h1><b> Dependentes </b></h1>
				<ul>
					<button class ='btn btn-primary'><h3> Zézinho Gotinha </h3></button>
					<button class ='btn btn-primary'><h3> Maria Gotinha </h3></button>
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