<?php
	
	include("conexao.php");
	
	$cpf = $_POST["cpf"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$data_nascimento = $_POST["data_nascimento"];
	$sexo = $_POST["sexo"];
	$gestante = $_POST["gestante"];
	$cpf_responsavel = $_POST["cpf_responsavel"];
	$endereco = $_POST["endereco"];
	$permissao = $_POST["permissao"];
	$senha = $_POST["senha"];
	$telefone = $_POST["telefone"];
	
	$alteracao = "UPDATE paciente SET 
				cpf = '$cpf',
				nome = '$nome',
				email = '$email',
				data_nascimento = '$data_nascimento',
				sexo = '$sexo',
				gestante = '$gestante',
				cpf_responsavel = '$cpf_responsavel',
				endereco = '$endereco',
				permissao = '$permissao',
				senha = '$senha',
				telefone = '$telefone',
				WHERE cpf = '$cpf'";

	mysqli_query($conexao,$alteracao)
		or die(mysqli_error($conexao));
	
	echo "1";
	
?>