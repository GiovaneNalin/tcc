<?php
	$id = filter_input(INPUT_GET, "id");
	$tipo_vacina = filter_input(INPUT_GET, "tipo_vacina");
	$fabricante = filter_input(INPUT_GET, "fabricante");
	$origem = filter_input(INPUT_GET, "origem");
	$destino = filter_input(INPUT_GET, "destino");
	$data_fabricacao = filter_input(INPUT_GET, "data_fabricacao");
	$data_validade = filter_input(INPUT_GET, "data_validade");
	
	$link = mysqli_connect("localhost", "root", "", "tcc");
	if($link){
		echo $id;

		$query = mysqli_query($link, "UPDATE lote SET tipo_vacina='$tipo_vacina', 
															fabricante='$fabricante',
															origem='$origem',
															destino='$destino',
															data_fabricacao='$data_fabricacao',
															data_validade='$data_validade'
															WHERE id='$id';");
		if($query){
			header("location:lote.php");
		}else{
			die("Erro: ". mysqli_error($link));
		}
	}else{
		die("Erro: " . mysqli_error($link));
	}
?>