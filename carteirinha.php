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
					<div><!-- a div se manterá oculta até clicar no nome do dono da carteirinha -->
					<button class ='btn btn-warning'> Próximas vacinas </button><br />
					<?php include("proximas_vacinas.php"); ?>
						
					</div>

				
			<h1><b> Dependentes </b></h1>			
				
						<div><!-- a div se manterá oculta até clicar no nome do dono da carteirinha -->
						<?php include("proximas_vacinas_dep.php"); ?>
						
					
		</div>
	</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>