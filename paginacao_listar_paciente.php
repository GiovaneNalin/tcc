<?php 
	include("conexao.php");
	
	$sql = "SELECT COUNT(*) as quantidade_paciente FROM paciente";
	
	if(!empty($_POST)){
		$cpf = $_POST["cpf_filtro"];
		$sql.= " WHERE cpf LIKE '%$cpf%'";
	}
	
	$resultado = mysqli_query($conexao, $sql) or die ("Erro." . mysqli_query($conexao));
	
	$linha = mysqli_fetch_assoc($resultado);
	
	$quantidade_paciente = $linha["quantidade_paciente"];
	
	$quantidade_pagina = (int) ($quantidade_paciente / 5);
	
	if($quantidade_paciente%5!=0){
		$quantidade_pagina++;
	}
	
	for($i=1;$i<=$quantidade_pagina;$i++){
		echo " <button type = 'button' class='pg' value = '$i'>$i</button> ";
	}
?>