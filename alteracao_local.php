<?php
	$id_postinho = filter_input(INPUT_GET, 'id_postinho');
	$nome_postinho = filter_input(INPUT_GET, 'nome_postinho');
	$endereco = filter_input(INPUT_GET, 'endereco');
			echo $id_postinho;
			echo $nome_postinho;
			echo $endereco;
	$link = mysqli_connect("localhost", "root", "", "tcc");
	if($link){			
		$query = mysqli_query($link, "UPDATE local SET nome_postinho='$nome_postinho', endereco='$endereco' WHERE id_postinho='$id_postinho';");
		if($query){			
			header("location:local.php");
		}else{
			die("Erro: ". mysqli_error($link));
		}
	}else{
		die("Erro: " . mysqli_error($link));
	}
?>