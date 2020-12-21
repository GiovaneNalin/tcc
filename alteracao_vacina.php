<?php
	$tipo = filter_input(INPUT_GET, 'tipo');
	$descricao = filter_input(INPUT_GET, 'descricao');
	
	$link = mysqli_connect("localhost", "root", "", "tcc");
	
	if($link){
		$query = mysqli_query($link, "UPDATE vacina SET tipo='$tipo', telefone='$descricao' WHERE tipo='$tipo';");
		if($query){
			header("location:listar_vacina.php");
		}else{
			die("Erro: ". mysqli_error()$link);
		}
	}else{
		die("Erro: " . mysqli_error($link));
	}
?>