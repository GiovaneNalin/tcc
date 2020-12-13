<?php
include_once "conexao.php";

//consultar no banco de dados

//consulta próximas doses do usuário logado
$cpf= $_SESSION["autorizado"];

//consultando dependentes
$result_dependentes = "SELECT * FROM paciente WHERE cpf_responsavel = $cpf";
$resultado_dependentes = mysqli_query($conexao, $result_dependentes);

while($row_dep = mysqli_fetch_assoc($resultado_dependentes)){
	$cpf_dep = $row_dep['cpf'];
	$nome_dep = $row_dep['nome'];
	$result_prox_dep = "SELECT  id_dose, data_agendada FROM dose WHERE cpf_paciente = $cpf_dep AND data_agendada != '00-00-0000' ORDER BY data_agendada DESC ";
	$resultado_prox_dep = mysqli_query($conexao, $result_prox_dep);
	
	$result_dose_dep = "SELECT * FROM dose WHERE cpf_paciente = $cpf_dep AND data_agendada = '00-00-0000' ORDER BY data_tomada DESC ";
	$resultado_dose_dep = mysqli_query($conexao, $result_dose_dep);
	
//Próximas vacinas de dependentes	

	echo "<h1> $nome_dep </h1>";
	echo"<button class ='btn btn-warning'> Próximas vacinas </button>
	<div class=container><table style='width: 1% !important;' class='table table-hover'>
	<thead>
		<tr> 
			<td> Dose</td> 
			<td> Data de agendamento </td>  
		</tr>
	</thead>";
	while($row_prox = mysqli_fetch_assoc($resultado_prox_dep)){
		echo "<tbody><tr><td>";
		echo $row_prox['id_dose'] . "</td><br><td>";
		echo $row_prox['data_agendada'] . "</td>";
		echo "</tr></tbody>";
	}
	echo "</table></div>";
	
//CARTEIRINHA DEPENDENTE
	
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
	while($row_dose_dep = mysqli_fetch_assoc($resultado_dose_dep)){
		echo "<tbody><tr><td>";
		echo $row_dose_dep['id_dose'] . "</td><td>";
		echo $row_dose_dep['lote'] . "</td><td>";
		echo $row_dose_dep['data_tomada'] . "</td><td>";
		echo $row_dose_dep['local'] . "</td><td>";
		echo $row_dose_dep['aplicador'] . "</td>";
		echo "</tr></tbody>";
	}
	echo "</table>";
}
