<?php
global $routes;//Torna acessivel em qualquer parte do sistema
$routes = array();

//Criando varios tipos de rotas

$routes['/galeria/{id}/{titulo}'] = '/galeria/abrir/:id/:titulo';//seusite.com.br/galeria/12
$routes['/news/{titulo}'] = '/noticias/abrir/:titulo';//seusite.com.br/news/o-que-e-bitcoin
$routes['/n/{titulo}'] = '/noticias/abrirtitulo/:titulo';//seusite.com.br/o-que-e-bitcoin

//$routes['/cadastro/{nome}/{sobrenome}'] = '/usuarios/cadastrar/:nome/:sobrenome';