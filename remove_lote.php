<?php
	$id = filter_input(INPUT_GET, "id");
	
	$link = mysqli_connect("db4free.net:3306", "giovane_nalin", "giovanenalin", "carteirinha");
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