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

		//percorrer $resultado_dependentes e contar quantos dependentes diferentes existem
		//criar suas respectivas tabelas com suas respectivas doses
//consultado doses dos dependentes


//Verificar se encontrou resultado na tabela "dose"
if(($resultado_prox) AND ($resultado_prox->num_rows != 0)){
	echo"<table border='1'>
	<tr> 
		<td> Dose</td> 
		<td> Data de agendamento </td>  
	</tr>";
	while($row_prox = mysqli_fetch_assoc($resultado_prox)){
		echo "<tr><td>";
		echo $row_prox['id_dose'] . "</td><br><td>";
		echo $row_prox['data_agendada'] . "</td><br><td>";
		echo "</tr>";
	}
	echo "</table>";
}else{
	echo "Nenhum agendamento encontrado";
}
