<?php
class Controller {

	//Vai carregar o view que queremos:
	public function loadView($viewName, $viewData = array()) {
		extract($viewData);//transforma a chave em variavel. 'valor' em $valor
		require 'views/'.$viewName.'.php';
	}
	//Vai carregar o cabeçalho do site
	public function loadTemplete($viewName, $viewData = array()) {
		require 'views/template.php';
	}
	//Carrega as informações dinamicas de cada página
	public function loadViewInTemplete($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}
}