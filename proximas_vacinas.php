<?php
include_once "conexao.php";

//consultar no banco de dados

//consulta próximas doses do usuário logado
$cpf= $_SESSION["autorizado"];
$result_prox = "SELECT id_dose, data_agendada FROM dose WHERE cpf_paciente = $cpf AND data_agendada != '00-00-0000' ORDER BY data_agendada DESC ";
$result_dose = "SELECT * FROM dose WHERE cpf_paciente = $cpf AND data_agendada = '00-00-0000' ORDER BY data_tomada DESC ";

$resultado_prox = mysqli_query($conexao, $result_prox);
$resultado_dose = mysqli_query($conexao, $result_dose);

//Verificar se encontrou resultado na tabela "dose"
if(($resultado_prox) AND ($resultado_prox->num_rows != 0)){
	echo"<div class=container><table style='width: 1% !important;'class='table table-hover'>
	<thead>
		<tr> 
			<td> Dose</td> 
			<td> Data de agendamento </td>  
		</tr>
	<thead>";
	while($row_prox = mysqli_fetch_assoc($resultado_prox)){
		echo "<tbody><tr><td>";
		echo $row_prox['id_dose'] . "</td><br><td>";
		echo $row_prox['data_agendada'] . "</td>";
		echo "</tr></tbody>";
	}
	echo "</table>";
}else{
	echo "Nenhum agendamento encontrado";
}
//montando a carteirinha
if(($resultado_dose) AND ($resultado_dose->num_rows != 0)){
	echo"<div class=container><table class='table table-hover'>
	<thead>
		<tr> 
			<td> Dose </td> 
			<td> Lote </td> 
			<td> Data da aplicação </td>  
			<td> Local </td>  
			<td> Aplicador </td>  
		</tr>
	<thead>";
	while($row_dose = mysqli_fetch_assoc($resultado_dose)){
		echo "<tbody><tr><td>";
		echo $row_dose['id_dose'] . "</td><td>";
		echo $row_dose['lote'] . "</td><td>";
		echo $row_dose['data_tomada'] . "</td><td>";
		echo $row_dose['local'] . "</td><td>";
		echo $row_dose['aplicador'] . "</td>";
		echo "</tr></tbody>";
	}
	echo "</table>";
}else{
	echo "Nenhum agendamento encontrado";
}
