<!DOCTYPE html>
<html lang = "pt-BR">
	<head>
		<meta charset = "UTF-8" />
		<title></title>
		<link rel="stylesheet" href="estilo.css"/>
	</head>
	<body>
<?php
	include("menu.php");
	
	include("conexao.php");
	
	$cpf = $SESSION_POST["autorizado"];
	$consulta_nome_aplicador= "SELECT nome FROM paciente WHERE cpf = '$Scpf' ";
	$resultado_nome =  mysqli_query($conexao,$consulta_nome_aplicador) or die ("ERRO");
	
	$lote = $_POST["lote"];
	$data_tomada = date('Y/m/d');
	$data_agendada = "";
	$confirmacao = '1';
	$local = $_POST["local"];
	$aplicador = $resultado_nome;
	$cpf_paciente = $_POST["cpf_paciente"];
	
	$insercao = "INSERT INTO dose
						VALUES ('$lote',
								'$data_tomada'
								'$data_agendada'
								'$confirmacao'
								'$local'
								'$aplicador'
								'$cpf_paciente'
								)";
	mysqli_error($conexao);
	mysqli_query($conexao, $insercao)
		or die("0");

		
	echo "<script language=javascript>alert( 'Cadastro realizado com sucesso!' );</script>";
	header("location: dose.php");
?>
	<body>
</html>