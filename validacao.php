<?php
	include("conexao.php");
	
	$cpf = $_POST["cpf"];
	$senha = $_POST["senha"];
	$pagina = $_POST["pagina"];
	
	$consulta = "SELECT * FROM paciente WHERE cpf = '$cpf' AND senha = '$senha'";
	$resultado = mysqli_query($conexao,$consulta) or die("CPF e/ou senha incorreto!");
	
	if(mysqli_num_rows($resultado)==1){
		console.log("1");
		session_start();
		$linha = mysqli_fetch_assoc($resultado);
		$_SESSION["autorizado"]=$linha["cpf"];
		$_SESSION["permissao"]=$linha["permissao"];
		$_SESSION["pagina"]=$pagina;
		if($_SESSION["pagina"]=="paciente"){
			header("location: home_paciente.php");
		}
		if($_SESSION["pagina"]=="agente"){
			header("location: home_agente.php");
		}
		if($_SESSION["pagina"]=="administrador"){
			header("location: home_administrador.php");
		}
	}else{
		echo"1";
		header("location: index.php?erro=1");
	}
?>