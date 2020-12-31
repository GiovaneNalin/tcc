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
	
	$nome_postinho = $_POST["nome_postinho"];
	$endereco = $_POST["endereco"];
	
	$insercao = "INSERT INTO local (nome_postinho, endereco)
						VALUES ('$nome_postinho',
								'$endereco'
								)";
	mysqli_error($conexao);
	mysqli_query($conexao, $insercao)
		or die("0");

		
	echo "<script language=javascript>alert( 'Cadastro realizado com sucesso!' );</script>";
	header("location: local.php");
?>
	<body>
</html>