<?php
include_once "conexao.php";

//consultar no banco de dados
$parametro = filter_input(INPUT_GET, "parametro");
if($parametro){
	$result_vacina = "SELECT * FROM vacina WHERE tipo LIKE '$parametro%' ORDER BY tipo DESC";
}else{
	$result_vacina = "SELECT * FROM vacina ORDER BY tipo DESC";
}
$resultado_vacina = mysqli_query($conexao, $result_vacina);

//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_vacina) AND ($resultado_vacina->num_rows != 0)){
	echo"<table border='1' class='table table-hover'>
	<thead><tr> 
		<td> ID Vacina </td> 
		<td> Vacina </td> 
		<td> Descrição </td> 
		<td colspan='2'> Ação </td> 
	</tr><thead><tbody>";
	while($row_vacina = mysqli_fetch_assoc($resultado_vacina)){
		echo "<tr><td>";
		echo $row_vacina['id_vacina'] . "</td><td>";
		echo $row_vacina['tipo'] . "</td><td>";
		echo $row_vacina['descricao'] . "</td>";?>
		<td><a class='btn btn-warning'href="<?php echo "altera_vacina.php?id_vacina=". $row_vacina['id_vacina'] ."&tipo=".$row_vacina['tipo']."&descricao=".$row_vacina['descricao']?>">Alterar</a></td>
		<td><a class='btn btn-danger'href="<?php echo "remove_vacina.php?id_vacina=". $row_vacina['id_vacina']?>">Remover</a></td>
		
		<?php echo "</tr></tbody>";
	}
	echo "</table>";
}else{
	echo "Nenhuma vacina encontrada";
}