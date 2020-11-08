<?php
include_once "conexao.php";

//consultar no banco de dados
$result_lote = "SELECT * FROM lote ORDER BY id DESC";
$resultado_lote = mysqli_query($conexao, $result_lote);

//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_lote) AND ($resultado_lote->num_rows != 0)){
	echo"<table border='1'>
	<tr> 
		<td> N° lote </td> 
		<td> Vacina </td> 
		<td> Fabricante </td> 
		<td> Páis de Origem </td> 
		<td> País de Destino </td> 
		<td> Data de Fabricação </td> 
		<td> Data de Validade </td> 
	</tr>";
	while($row_lote = mysqli_fetch_assoc($resultado_lote)){
		echo "<tr><td>";
		echo $row_lote['id'] . "</td><br><td>";
		echo $row_lote['tipo_vacina'] . "</td><br><td>";
		echo $row_lote['fabricante'] . "</td><br><td>";
		echo $row_lote['origem'] . "</td><br><td>";
		echo $row_lote['destino'] . "</td><br><td>";
		echo $row_lote['data_fabricacao'] . "</td><br><td>";
		echo $row_lote['data_validade'] . "</td><br>";
		echo "</tr>";
	}
	echo "</table>";
}else{
	echo "Nenhuma lote encontrada";
}