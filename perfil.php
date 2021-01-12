<?php include("conexao.php");
	session_start();
	include ("menu.php");
	$cpf = $_SESSION["autorizado"];
	if(!empty($_SESSION["autorizado"])){
		$consulta = "SELECT cpf,
							nome,
							email,
							data_nascimento,
							sexo,
							cpf_responsavel,
							senha,
							telefone,
							cep,
							numero
					FROM paciente WHERE cpf=$cpf";
		$con = mysqli_query($conexao, $consulta) or die ($mysqli->error);
		$dado=$con->fetch_array();
		
?>
	<title> Perfil - Carteirinha de vacinação digital </title>
	</head>
	<body class='bg-info'>
	<div>
		<div>
			<h1 align='center'> Dados de usuário </h1>
		</div>
		<div class='container'>
			<table class='table table-hover'>			
				<tr><td><b> CPF: </b></td> 
						<td> <?php echo $dado["cpf"] ?> </td> 
				</tr>
				
				<tr><td><b> Nome </b></td> 
						<td> <?php echo $dado["nome"] ?> </td> 
				</tr>
				
				<tr><td><b> Data de nascimento: </b></td> 
						<td> <?php echo $dado["data_nascimento"] ?> </td> 
				</tr>
				
				<tr><td><b> Sexo </b></td> 
						<td> <?php echo $dado["sexo"] ?> </td> 
				</tr>
				
				<tr><td><b> E-mail: </b></td> 
						<td> <?php echo $dado["email"] ?> </td> 
				</tr>
				
				<tr><td><b> Telefone: </b></td> 
						<td> <?php echo $dado["telefone"] ?> </td> 
				</tr>
				
				<tr><td><b> CPF do responsável: </b></td> 
						<td> <?php echo $dado["cpf_responsavel"] ?> </td> 
				</tr>
				<tr><td><b> Endereço: </b></td> 
						<td> (<b>CEP:</b> <?php echo $dado["cep"] ?> <b>Número</b> <?php echo $dado["numero"] ?>)</td>
				</tr>				
			</table>
			<div>
				<a class='btn btn-warning' href="<?php echo "altera_email.php?cpf=". $dado['cpf'] 
												."&email=".$dado['email']
												?>">Alterar Email</a>
												
				<a class='btn btn-warning' href="<?php echo "altera_telefone.php?cpf=". $dado['cpf'] 
												."&telefone=".$dado['telefone']
												?>">Alterar Telefone</a>
												
				<a class='btn btn-warning' href="<?php echo "altera_senha.php?cpf=". $dado['cpf'] 
												."&senha=".$dado['senha']
												?>">Alterar Senha</a>
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