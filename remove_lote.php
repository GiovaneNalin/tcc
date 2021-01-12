<?php
	$id = filter_input(INPUT_GET, "id");
	
	$link = mysqli_connect("localhost", "root", "", "tcc");
	if($link){
		echo $id;

		$query = mysqli_query($link, "DELETE FROM lote WHERE id='$id';");
		if($query){
			header("location:lote.php");
		}else{
			die("Erro: ". mysqli_error($link));
		}
	}else{
		die("Erro: " . mysqli_error($link));
	}
?>