<?php
/*
--Auxiliador para conectar ao Banco de Dados
*/
class Model {

	protected $db;

	public function __construct() {
		global $db;
		$this->db = $db;//Envia para o protected db
	}
}