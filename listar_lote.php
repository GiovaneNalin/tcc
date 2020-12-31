<?php
include_once "conexao.php";

//consultar no banco de dados
$parametro = filter_input(INPUT_GET, "parametro");
if($parametro){
	//$result_lote = "SELECT * FROM lote WHERE id LIKE '$parametro%' ORDER BY id ASC";
	$result_lote = "SELECT * FROM lote INNER JOIN vacina on lote.tipo_vacina = vacina.id_vacina WHERE id LIKE '$parametro%' ORDER BY id ASC";
}else{
	//$result_lote = "SELECT * FROM lote ORDER BY id ASC";
	$result_lote = "SELECT * FROM lote INNER JOIN vacina on lote.tipo_vacina = vacina.id_vacina ORDER BY id ASC";
}
$resultado_lote = mysqli_query($conexao, $result_lote);

//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_lote) AND ($resultado_lote->num_rows != 0)){
	echo"<table border='1' class='table table-hover'>
	<thead>
	<tr> 
		<td> N° lote </td> 
		<td> Vacina </td> 
		<td> Fabricante </td> 
		<td> Páis de Origem </td> 
		<td> País de Destino </td> 
		<td> Data de Fabricação </td> 
		<td> Data de Validade </td> 
		<td colspan='2'> Ação </td> 
	</tr></thead><tbody>";
	while($row_lote = mysqli_fetch_assoc($resultado_lote)){
		echo "<tr><td>";
		echo $row_lote['id'] . "</td><td>";
		echo $row_lote['tipo'] . "</td><td>";
		echo $row_lote['fabricante'] . "</td><td>";
		echo $row_lote['origem'] . "</td><td>";
		echo $row_lote['destino'] . "</td><td>";
		echo $row_lote['data_fabricacao'] . "</td><td>";
		echo $row_lote['data_validade'] . "</td>";?>
		<td><a class='btn btn-warning' href="<?php echo "altera_lote.php?id=". $row_lote['id'] 
												."&tipo_vacina=".$row_lote['tipo_vacina'].
												"&fabricante=".$row_lote['fabricante'].
												"&origem=".$row_lote['origem'].
												"&destino=".$row_lote['destino'].
												"&data_fabricacao=".$row_lote['data_fabricacao'].
												"&data_validade=".$row_lote['data_validade']
												?>">Alterar</a></td>
		<td><a class='btn btn-danger' href="<?php echo "remove_lote.php?id=". $row_lote['id']?>">Remover</a></td>
		
		<?php echo "</tr></tbody>";
	}
	echo "</table>";
}else{
	echo "Nenhuma lote encontrada";
}