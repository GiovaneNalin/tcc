<?php include("conexao.php");
	session_start();
	include ("menu.php");
	if(!empty($_SESSION["autorizado"])){
		$consulta = "SELECT cpf,
							nome,
							email,
							data_nascimento,
							sexo,
							gestante,
							cpf_responsavel,
							endereco,
							telefone							 
					FROM paciente";
		$con = mysqli_query($conexao, $consulta) or die ($mysqli->error);
		$dado=$con->fetch_array();
?>
	<title> Perfil - Carteirinha de vacinação digital </title>
	</head>
	<body class='bg-info'>
	<div>
		<div>
			<h1> Dados de usuário </h1>
			<?php echo $dado["cpf"] ?>
		</div>
		<div>
			<table class='table'>
			
				<tr><td><b> CPF: </b></td> 
						<td> <?php echo $dado["cpf"] ?> </td> 
					<td><b> Nome </b></td> 
						<td> <?php echo $dado["nome"] ?> </td> 
				</tr>
				
				<tr><td><b> Data de nascimento: </b></td> 
						<td> <?php echo $dado["data_nascimento"] ?> </td> 
					<td><b> Sexo </b></td> 
						<td> <?php echo $dado["sexo"] ?> </td> 
				</tr>
				
				<tr><td><b> E-mail: </b></td> 
						<td> <?php echo $dado["email"] ?> </td> 
					<td><b> Telefone: </b></td> 
						<td> <?php echo $dado["telefone"] ?> </td> 
				</tr>
				
				<tr><td><b> Gestante?: </b></td> 
						<td> <?php echo $dado["gestante"] ?> </td> 
					<td><b> CPF do responsável: </b></td> 
						<td> <?php echo $dado["cpf_responsavel"] ?> </td> 
				</tr>
				<tr><td><b> Endereço: </b></td> 
						<td> <?php echo $dado["endereco"] ?> </td>
				</tr>
				
			</table>
			<div>
				<button> Alterar e-mail </button> <button> Alterar senha </button> <button> Alterar telefone </button>
			</div>
		</div>
	</div>
	</body>
</html>
		<?php
			}else{
				header("location: index.php");
			}
		?>