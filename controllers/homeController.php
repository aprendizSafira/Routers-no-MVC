<?php
class homeController extends Controller {

	public function index() {
		$anuncios = new Anuncios();//se for instânciada fora do metódo não funciona
		$usuarios = new Usuarios();

		$dados = array(
			'quantidade' => $anuncios->getQuantidade(),
			'nome' => $usuarios->getNome(),
			'idade' => $usuarios->getIdade()
		);
		
		$this->loadTemplete('home', $dados);
	}
}