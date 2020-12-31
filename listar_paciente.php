<?php
include_once "conexao.php";

//consultar no banco de dados
$parametro = filter_input(INPUT_GET, "parametro");
if($parametro){
	$result_paciente = "SELECT * FROM paciente WHERE cpf LIKE '$parametro%' ORDER BY cpf ASC";
}else{
	$result_paciente = "SELECT * FROM paciente ORDER BY cpf ASC";
}
$resultado_paciente = mysqli_query($conexao, $result_paciente);

//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_paciente) AND ($resultado_paciente->num_rows != 0)){
	echo"<table border='1' class='table table-hover'>
	<thead><tr> 
		<td> CPF </td> 
		<td> Nome </td> 
		<td> Email </td> 
		<td> Data de Nascimento </td> 
		<td> Sexo </td> 
		<td> Gestante </td> 
		<td> CPF do Resposável </td> 
		<td> Endereço </td> 
		<td> Nível de permissão </td> 
		<td> Senha </td> 
		<td> Telefone </td> 
		<td colspan='2'> Ação </td> 
	</tr><thead><tbody>";
	while($row_paciente = mysqli_fetch_assoc($resultado_paciente)){
		echo "<tr><td>";
		echo $row_paciente['cpf'] . "</td><td>";
		echo $row_paciente['nome'] . "</td><td>";
		echo $row_paciente['email'] . "</td><td>";
		echo $row_paciente['data_nascimento'] . "</td><td>";
		echo $row_paciente['sexo'] . "</td><td>";
		echo $row_paciente['gestante'] . "</td><td>";
		echo $row_paciente['cpf_responsavel'] . "</td><td>";
		echo $row_paciente['endereco'] . "</td><td>";
		echo $row_paciente['permissao'] . "</td><td>";
		echo $row_paciente['senha'] . "</td><td>";
		echo $row_paciente['telefone'] . "</td>";?>
		<td><a class='btn btn-warning'href="<?php echo "altera_paciente.php?cpf=". $row_paciente['cpf'] .
														"&nome=".$row_paciente['nome'].
														"&email=".$row_paciente['email'].
														"&data_nascimento=".$row_paciente['data_nascimento'].
														"&sexo=".$row_paciente['sexo'].
														"&gestante=".$row_paciente['gestante'].
														"&cpf_responsavel=".$row_paciente['cpf_responsavel'].
														"&endereco=".$row_paciente['endereco'].
														"&permissao=".$row_paciente['permissao'].
														"&senha=".$row_paciente['senha'].
														"&telefone=".$row_paciente['telefone']?>">Alterar</a></td>
		<td><a class='btn btn-danger'href="<?php echo "remove_paciente.php?cpf=". $row_paciente['cpf']?>">Remover</a></td>
		
		<?php echo "</tr></tbody>";
	}
	echo "</table>";
}else{
	echo "Nenhum paciente encontrado";
}