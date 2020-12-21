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
	echo"<table border='1'>
	<tr> 
		<td> Vacina </td> 
		<td> Descrição </td> 
		<td> Ação </td> 
	</tr>";
	while($row_vacina = mysqli_fetch_assoc($resultado_vacina)){
		echo "<tr><td>";
		echo $row_vacina['tipo'] . "</td><td>";
		echo $row_vacina['descricao'] . "</td>";?>
		<td><a href="<?php echo "altera_vacina.php?tipo=". $linha['tipo'] ."&descricao=".$linha['descricao']?>">Alterar</a></td>
		
		<?php echo "</tr>";
	}
	echo "</table>";
}else{
	echo "Nenhuma vacina encontrada";
}