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
	
	$tipo = $_POST["tipo"];
	$descricao = $_POST["descricao"];
	
	$insercao = "INSERT INTO vacina
						VALUES ('$tipo',
								'$descricao'
								)";
	mysqli_error($conexao);
	mysqli_query($conexao, $insercao)
		or die("0");

		
	echo "<script language=javascript>alert( 'Cadastro realizado com sucesso!' );</script>";
	header("location: vacina.php");
?>
	<body>
</html>