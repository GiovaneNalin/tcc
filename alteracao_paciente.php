<?php
	$cpf_antigo = filter_input(INPUT_GET, "cpf_antigo");
	$cpf = filter_input(INPUT_GET, "cpf");
	$nome = filter_input(INPUT_GET, "nome");
	$email= filter_input(INPUT_GET, "email");
	$data_nascimento = filter_input(INPUT_GET, "data_nascimento");
	$sexo= filter_input(INPUT_GET, "sexo");
	$gestante = filter_input(INPUT_GET, "gestante");
	$cpf_responsavel = filter_input(INPUT_GET, "cpf_responsavel");
	$endereco = filter_input(INPUT_GET, "endereco");
	$permissao = filter_input(INPUT_GET, "permissao");
	$senha = filter_input(INPUT_GET, "senha");
	$telefone = filter_input(INPUT_GET, "telefone");
	
	$link = mysqli_connect("db4free.net:3306", "giovane_nalin", "giovanenalin", "carteirinha");
	if($link){
		echo $cpf;

		$query = mysqli_query($link, "UPDATE paciente SET cpf='$cpf', 
														nome='$nome', 
														email='$email', 
														data_nascimento='$data_nascimento', 
														sexo='$sexo', 
														gestante='$gestante', 
														cpf_responsavel='$cpf_responsavel', 
														endereco='$endereco', 
														permissao='$permissao', 
														senha='$senha', 
														telefone='$telefone'
														WHERE cpf='$cpf_antigo';");
		if($query){
			header("location:paciente.php");
		}else{
			die("Erro: ". mysqli_error($link));
		}
	}else{
		die("Erro: " . mysqli_error($link));
	}
?>