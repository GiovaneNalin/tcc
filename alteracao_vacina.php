<?php
	$id_vacina = filter_input(INPUT_GET, 'id_vacina');
	$tipo = filter_input(INPUT_GET, 'tipo');
	$descricao = filter_input(INPUT_GET, 'descricao');
	
	$link = mysqli_connect("localhost", "root", "", "tcc");
	if($link){
		echo $id_vacina;

		$query = mysqli_query($link, "UPDATE vacina SET tipo='$tipo', descricao='$descricao' WHERE id_vacina='$id_vacina';");
		if($query){
			header("location:vacina.php");
		}else{
			die("Erro: ". mysqli_error($link));
		}
	}else{
		die("Erro: " . mysqli_error($link));
	}
?>