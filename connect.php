<?php
require 'environment.php';

$connect = array();
//VERIFICANDO: se a conecção com o banco é local ou externa.
if (ENVIRONMENT == 'development') {//quer dizer que está fazendo a conecção atravez do servidor local
	define("BASE_URL", "http://localhost/PHP-Super-Avancado/Routers-no-MVC/");
	$connect['dbname'] = 'estrutura_mvc';
	$connect['host']   = 'localhost';
	$connect['dbuser'] = 'root';
	$connect['dbpass'] = '';
} else {
	//Coloca as informções do servidor externo.
	define("BASE_URL", "http://meusite.com.br/");
	$connect['dbname'] = 'estrutura_mvc';
	$connect['host']   = 'localhost';
	$connect['dbuser'] = 'root';
	$connect['dbpass'] = '';
}

//Torna a conecção ao banco de dados acessivel a qualquer parte do sistema.
global $db;

	try {

		$db = new PDO("mysql:dbname=".$connect['dbname'].";host=".$connect['host'], $connect['dbuser'], $connect['dbpass']);

	} catch(PDOException $e) {

		echo 'ERRROR: '.$e->getMessage();

	}