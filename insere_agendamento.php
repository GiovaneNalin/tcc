<?php session_start(); ?>
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
	
	$tipo_vacina = $_POST["tipo_vacina"];
	$cpf_paciente = $_POST["cpf_paciente"];
	$data_agendada = $_POST["data_agendada"];
	$insercao = "INSERT INTO agendamento (tipo_vacina, cpf_paciente, data_agendada)
						VALUES (
								'$tipo_vacina',								
								'$cpf_paciente',
								'$data_agendada'
								)";
	mysqli_error($conexao);
	mysqli_query($conexao, $insercao)
		or die(mysqli_error($conexao));

		
	echo "<script language=javascript>alert( 'Cadastro realizado com sucesso!' );</script>";
	header("location: agenda_dose.php");
?>
	<body>
</html>
	