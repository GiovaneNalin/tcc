<?php
include_once "conexao.php";

//consultar no banco de dados

//consultado doses do usuário logado
$cpf= $_SESSION["autorizado"];
$result_prox = "SELECT  id_dose, data_agendada FROM dose WHERE cpf_paciente = $cpf AND data_agendada != '00-00-0000' ORDER BY data_agendada DESC ";
$resultado_prox = mysqli_query($conexao, $result_prox);

//consultando dependentes
$result_dependentes = "SELECT * FROM paciente WHERE cpf_responsavel = $cpf";
$resultado_dependentes = mysqli_query($conexao, $result_dependentes);

//Verificar se encontrou resultado na tabela "dose"
if(($resultado_prox) AND ($resultado_prox->num_rows != 0)){
	echo"<div class=container><table class='table table-hover'>
	<thead>
		<tr> 
			<td> Dose</td> 
			<td> Data de agendamento </td>  
		</tr>
	<thead>";
	while($row_prox = mysqli_fetch_assoc($resultado_prox)){
		echo "<tbody><tr><td>";
		echo $row_prox['id_dose'] . "</td><br><td>";
		echo $row_prox['data_agendada'] . "</td><br><td>";
		echo "</tr></tbody>";
	}
	echo "</table>";
}else{
	echo "Nenhum agendamento encontrado";
}

//Próximas vacinas de dependentes
while($row_dep = mysqli_fetch_assoc($resultado_dependentes)){
	$cpf_dep = $row_dep['cpf'];
	$nome_dep = $row_dep['nome'];
	$result_prox_dep = "SELECT  id_dose, data_agendada FROM dose WHERE cpf_paciente = $cpf_dep AND data_agendada != '00-00-0000' ORDER BY data_agendada DESC ";
	$resultado_prox_dep = mysqli_query($conexao, $result_prox_dep);
	
	echo "<h1> $nome_dep </h1>";
	echo"<div class=container><table class='table table-hover'>
	<thead>
		<tr> 
			<td> Dose</td> 
			<td> Data de agendamento </td>  
		</tr>
	</thead>";
	while($row_prox = mysqli_fetch_assoc($resultado_prox_dep)){
		echo "<tbody><tr><td>";
		echo $row_prox['id_dose'] . "</td><br><td>";
		echo $row_prox['data_agendada'] . "</td><br><td>";
		echo "</tr></tbody>";
	}
	echo "</table></div>";
}
