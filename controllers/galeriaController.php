<?php
class galeriaController extends Controller {

	public function index() {
		
	}
	public function abrir($id, $titulo) {
		echo "ID: ".$id."<br/>";
		echo "TITULO: ".$titulo;
	}

}