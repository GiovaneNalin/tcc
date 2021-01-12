<?php

	//local no qual o banco de dados esta instalado
	$local = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "tcc";
	
	$conexao = mysqli_connect($local,$usuario,$senha,$bd) or die ("ERRO");
	
?>