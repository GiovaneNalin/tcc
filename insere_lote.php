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
	
	$id = $_POST["id"];
	$tipo_vacina = $_POST["tipo_vacina"];
	$fabricante = $_POST["fabricante"];
	$origem = $_POST["origem"];
	$destino = $_POST["destino"];
	$data_fabricacao = $_POST["data_fabricacao"];
	$data_validade = $_POST["data_validade"];
	
	$insercao = "INSERT INTO lote
						VALUES ('$id',
								'$tipo_vacina',
								'$fabricante',
								'$origem',
								'$destino',
								'$data_fabricacao',
								'$data_validade'
								)";
	mysqli_error($conexao);
	mysqli_query($conexao, $insercao)
		or die("0");

		
	echo "<script language=javascript>alert( 'Cadastro realizado com sucesso!' );</script>";
	header("location: lote.php");
?>
	<body>
</html>