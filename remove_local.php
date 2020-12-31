<?php
	$id = filter_input(INPUT_GET, "id_postinho");
	
	$link = mysqli_connect("localhost", "root", "", "tcc");
	if($link){
		echo $id;

		$query = mysqli_query($link, "DELETE FROM local WHERE id_postinho='$id';");
		if($query){
			header("location:local.php");
		}else{
			die("Erro: ". mysqli_error($link));
		}
	}else{
		die("Erro: " . mysqli_error($link));
	}