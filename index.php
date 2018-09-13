<?php
/* Conceito 
//Tenho a pasta Estrutura-MVC1 onde esta o arquivo->index.php
//Como vaou dizer para o controller o que ele tem que acessar. Que é apartir do controller que ele acessa as outras coisas. É apartir do parametro (url=controller).
//--http://localhost:8080/PHP-Super-Avancado/Estrutura-MVC1/index.php?url=controller
// Dai posso acessar esse parametro por aqui = echo 'URL: '.$_GET['url'];
// RESULTADO = URL:controller ou URL:Home e assim cada pagina que for acessada é passada pelo parametro 'url'
*/
session_start();
require 'connect.php';
require 'routers.php';

spl_autoload_register(function($class){
	//Sempre que uma classe for instânciada, tem de ser procurada em 3 pastas:controllers- models ou core
	if(file_exists('controllers/'.$class.'.php')) {
		require 'controllers/'.$class.'.php';

	} else if(file_exists('models/'.$class.'.php')) {
		require 'models/'.$class.'.php';

	} else if(file_exists('core/'.$class.'.php')) {

		require 'core/'.$class.'.php';
	}
});

$core = new Core();
$core->run();