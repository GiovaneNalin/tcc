<?php

	//local no qual o banco de dados esta instalado
	$local = "db4free.net:3306";
	$usuario = "giovane_nalin";
	$senha = "giovanenalin";
	$bd = "carteirinha";
	
	$conexao = mysqli_connect($local,$usuario,$senha,$bd) or die ("ERRO");
	
?>
