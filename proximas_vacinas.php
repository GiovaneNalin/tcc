<?php
include_once "conexao.php";

//consultar no banco de dados

//consulta próximas doses do usuário logado
$cpf= $_SESSION["autorizado"];
$result_prox = "SELECT * FROM agendamento  
						INNER JOIN vacina ON vacina.id_vacina = agendamento.tipo_vacina
						WHERE cpf_paciente = $cpf ORDER BY data_agendada DESC ";
$result_dose = "SELECT * FROM dose 
						INNER JOIN lote ON lote.id = dose.lote 
						INNER JOIN paciente ON paciente.cpf = dose.aplicador 
						INNER JOIN local ON local.id_postinho = dose.local
						INNER JOIN vacina ON  vacina.id_vacina = lote.tipo_vacina 
						WHERE cpf_paciente = $cpf  
						ORDER BY data_tomada DESC ";
					
//$result_dose = "SELECT * FROM lote INNER JOIN dose ON lote.id = dose.lote WHERE cpf_paciente = $cpf AND data_agendada = '00-00-0000' ORDER BY data_tomada DESC";

//utilizar ele no while ao inves das outras consultas.
							
$resultado_prox = mysqli_query($conexao, $result_prox);
$resultado_dose = mysqli_query($conexao, $result_dose);

//Verificar se encontrou resultado na tabela "dose"
if(($resultado_prox) AND ($resultado_prox->num_rows != 0)){
	echo"<div class=container><table style='width: 1% !important;'class='table table-hover'>
	<thead>
		<tr> 
			<td> Vacina</td> 
			<td> Data de agendamento </td>  
		</tr>
	<thead>";
	while($row_prox = mysqli_fetch_assoc($resultado_prox)){
		echo "<tbody><tr><td>";
		echo $row_prox['tipo'] . "</td><br><td>";
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
			<td> Número da Dose </td> 
			<td> Lote </td> 
			<td> Data da Aplicação </td>  
			<td> Local </td>  
			<td> Aplicador </td>  
		</tr>
	<thead>";
	while($row_dose = mysqli_fetch_assoc($resultado_dose)){
		echo "<tbody><tr><td>";
		echo $row_dose['tipo'] . "</td><td>";
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
