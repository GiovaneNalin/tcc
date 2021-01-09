<?php
	$id = filter_input(INPUT_GET, "id");
	$senha = filter_input(INPUT_GET, "senha");
	
	$link = mysqli_connect("db4free.net:3306", "giovane_nalin", "giovanenalin", "carteirinha");
	if($link){
		echo $id;

		$query = mysqli_query($link, "UPDATE paciente SET senha='$senha'
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