<?php
	$id = filter_input(INPUT_GET, "id");
	$telefone = filter_input(INPUT_GET, "telefone");
	
	$link = mysqli_connect("localhost", "root", "", "tcc");
	if($link){
		echo $id;

		$query = mysqli_query($link, "UPDATE paciente SET telefone='$telefone'
															WHERE cpf='$id';");
		if($query){
			header("location:perfil.php");
		}else{
			die("Erro: ". mysqli_error($link));
		}
	}else{
		die("Erro: " . mysqli_error($link));
	}
?>