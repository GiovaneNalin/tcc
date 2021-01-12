<?php
	$cpf_antigo = filter_input(INPUT_GET, "cpf_antigo");
	$cpf = filter_input(INPUT_GET, "cpf");
	$nome = filter_input(INPUT_GET, "nome");
	$email= filter_input(INPUT_GET, "email");
	$data_nascimento = filter_input(INPUT_GET, "data_nascimento");
	$sexo= filter_input(INPUT_GET, "sexo");
	$cpf_responsavel = filter_input(INPUT_GET, "cpf_responsavel");
	$permissao = filter_input(INPUT_GET, "permissao");
	$senha = filter_input(INPUT_GET, "senha");
	$telefone = filter_input(INPUT_GET, "telefone");
	$cep = filter_input(INPUT_GET, "cep");
	$numero = filter_input(INPUT_GET, "numero");
	
	$link = mysqli_connect("localhost", "root", "", "tcc");
	if($link){
		echo $cpf;

		$query = mysqli_query($link, "UPDATE paciente SET cpf='$cpf', 
														nome='$nome', 
														email='$email', 
														data_nascimento='$data_nascimento', 
														sexo='$sexo', 
														cpf_responsavel='$cpf_responsavel', 
														permissao='$permissao', 
														senha='$senha', 
														telefone='$telefone',
														cep='$cep',
														numero='$numero'
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