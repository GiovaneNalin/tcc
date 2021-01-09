<?php
	$id = filter_input(INPUT_GET, "id");
	$email = filter_input(INPUT_GET, "email");
	
	$link = mysqli_connect("db4free.net:3306", "giovane_nalin", "giovanenalin", "carteirinha");
	if($link){
		echo $id;

		$query = mysqli_query($link, "UPDATE paciente SET email='$email'
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