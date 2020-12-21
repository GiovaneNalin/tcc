<?php
include_once "conexao.php";

//consultar no banco de dados

//consulta próximas doses do usuário logado
$parametro = filter_input(INPUT_GET, "parametro");
if($parametro){
	$result_prox = "SELECT tipo_vacina, data_agendada FROM agendamento WHERE cpf_paciente = $parametro ORDER BY data_agendada DESC ";
	$result_dose = "SELECT * FROM dose 
						INNER JOIN lote ON lote.id = dose.lote 
						INNER JOIN paciente ON paciente.cpf = dose.aplicador 
						INNER JOIN local ON local.id_postinho = dose.local
						WHERE cpf_paciente = $parametro  
						ORDER BY data_tomada DESC ";
						
	$result_nome="SELECCT nome FROM paciente WHERE cpf LIKE '$parametro'";
					
//$result_dose = "SELECT * FROM lote INNER JOIN dose ON lote.id = dose.lote WHERE cpf_paciente = $cpf AND data_agendada = '00-00-0000' ORDER BY data_tomada DESC";

//utilizar ele no while ao inves das outras consultas.
							
$resultado_prox = mysqli_query($conexao, $result_prox);
$resultado_dose = mysqli_query($conexao, $result_dose);
$resultado_nome = mysqli_query($conexao, $result_nome);

//montando a carteirinha
if(($resultado_dose) AND ($resultado_dose->num_rows != 0)){
	echo"<div class=container>
	<h1 align='left'>CPF: $parametro <br/>Nome:  </h1>
	<h2> Carteirinha </h2><table class='table table-hover'>
	<thead>
		<tr> 
			<td> Dose </td> 
			<td> Número da Dose </td> 
			<td> Lote </td> 
			<td> Data da Aplicação </td>  
			<td> Local </td>  
			<td> Aplicador </td>  
		</tr>
	<thead>";
	while($row_dose = mysqli_fetch_assoc($resultado_dose)){
		echo "<tbody><tr><td>";
		echo $row_dose['tipo_vacina'] . "</td><td>";
		echo $row_dose['id_dose'] . "</td><td>";
		echo $row_dose['lote'] . "</td><td>";
		echo $row_dose['data_tomada'] . "</td><td>";
		echo $row_dose['nome_postinho'] . "</td><td>";
		echo $row_dose['nome'] . "</td>";		
		echo "</tr></tbody>";
	}
	echo "</table>";
}else{
	echo "Nenhum agendamento encontrado";
}
//Verificar se encontrou resultado na tabela "dose"
if(($resultado_prox) AND ($resultado_prox->num_rows != 0)){
	echo"<div class=container><h2> Próximas Vacinas </h2><table style='width: 1% !important;'class='table table-hover'>
	<thead>
		<tr> 
			<td> Vacina</td> 
			<td> Data de agendamento </td>  
		</tr>
	<thead>";
	while($row_prox = mysqli_fetch_assoc($resultado_prox)){
		echo "<tbody><tr><td>";
		echo $row_prox['tipo_vacina'] . "</td><br><td>";
		echo $row_prox['data_agendada'] . "</td>";
		echo "</tr></tbody>";
	}
	echo "</table>";
}else{
	echo "Nenhum agendamento encontrado";
}

}
