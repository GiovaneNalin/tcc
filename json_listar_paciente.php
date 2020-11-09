<?php
	header("Content-Type: Application/json");
	
	include('conexao.php');
	
	$p = $_POST["pg"];
	
	$sql='SELECT * FROM paciente';
	
	if(isset($_POST["cpf_filtro"])){
		$nome = $_POST["cpf_filtro"];
		$sql .= " WHERE cpf LIKE '%$cpf%'";
	}
	
	$sql.= " LIMIT $p,5";
	
	$resultado = mysqli_query($conexao, $sql) or die("Erro." . mysqli_error($conexao));
				
	while($linha = mysqli_fetch_assoc($resultado)){
		$matriz[] = $linha;
	}
	
	echo json_encode($matriz);
?>