<?php
include_once "conexao.php";

//consultar no banco de dados
$parametro = filter_input(INPUT_GET, "parametro");
if($parametro){
	$result_local = "SELECT * FROM local WHERE nome_postinho LIKE '%$parametro%' ORDER BY nome_postinho ASC";
}else{
	$result_local = "SELECT * FROM local ORDER BY nome_postinho ASC";
}
$resultado_local = mysqli_query($conexao, $result_local);

//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_local) AND ($resultado_local->num_rows != 0)){
	echo"<table border='1' class='table table-hover'>
	<thead><tr> 
		<td> ID Postinho </td> 
		<td> local </td> 
		<td> CEP </td> 
		<td> Número </td> 
		<td colspan='2'> Ação </td> 
	</tr><thead><tbody>";
	while($row_local = mysqli_fetch_assoc($resultado_local)){
		echo "<tr><td>";
		echo $row_local['id_postinho'] . "</td><td>";
		echo $row_local['nome_postinho'] . "</td><td>";
		echo $row_local['cep'] . "</td><td>";
		echo $row_local['numero'] . "</td>";?>
		<td><a class='btn btn-warning'href="<?php echo "altera_local.php?id_postinho=". $row_local['id_postinho'] ."&nome_postinho=".$row_local['nome_postinho']."&cep=".$row_local['cep']."&numero=".$row_local['numero']?>">Alterar</a></td>
		<td><a class='btn btn-danger'href="<?php echo "remove_local.php?id_postinho=". $row_local['id_postinho']?>">Remover</a></td>
		
		<?php echo "</tr></tbody>";
	}
	echo "</table>";
}else{
	echo "Nenhuma local encontrado";
}