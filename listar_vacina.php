<?php
include_once "conexao.php";

//consultar no banco de dados
$result_vacina = "SELECT * FROM vacina ORDER BY tipo DESC";
$resultado_vacina = mysqli_query($conexao, $result_vacina);

//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_vacina) AND ($resultado_vacina->num_rows != 0)){
	echo"<table border='1'>
	<tr> 
		<td> Vacina </td> 
		<td> Descrição </td> 
	</tr>";
	while($row_vacina = mysqli_fetch_assoc($resultado_vacina)){
		echo "<tr><td>";
		echo $row_vacina['tipo'] . "</td><br><td>";
		echo $row_vacina['descricao'] . "</td><br>";
		echo "</tr>";
	}
	echo "</table>";
}else{
	echo "Nenhuma vacina encontrada";
}