<?php
	$servidor = "localhost";
	$usuario = "agor_link";
	$senha = "Red4815@";
	$basename = "agor_link";

	// Url do site
	$site['url'] = 'https://agoracariri.com.br/link';

	

	global $site;

	$conn = mysqli_connect($servidor, $usuario, $senha, $basename);

	mysqli_set_charset($conn, 'utf8');
	date_default_timezone_set("America/Sao_Paulo");
	setlocale(LC_ALL, 'pt_BR');
?>