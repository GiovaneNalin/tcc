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
	$cep = $_POST["cep"];
	$numero = $_POST["numero"];
	
	$insercao = "INSERT INTO local (nome_postinho, cep, numero)
						VALUES ('$nome_postinho',
								'$cep',
								'$numero'
								)";
	mysqli_error($conexao);
	mysqli_query($conexao, $insercao)
		or die("0");

		
	echo "<script language=javascript>alert( 'Cadastro realizado com sucesso!' );</script>";
	header("location: local.php");
?>
	<body>
</html>