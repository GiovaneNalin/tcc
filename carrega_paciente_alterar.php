<?php
	
	header ("Content-Type: Application/json");
	
	include("conexao.php");
	
	$cpf = $_POST["cpf"];
	
	$sql = "SELECT * FROM paciente WHERE cpf = '$cpf'";
	
	$resultado = mysqli_query($conexao,$sql) or die ("Erro." . mysqli_query($conexao));
	
	$linha = mysqli_fetch_assoc($resultado);
	
	echo json_encode($linha);
	
?>