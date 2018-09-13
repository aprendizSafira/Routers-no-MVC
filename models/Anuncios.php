<?php
class Anuncios extends Model {

	public function getQuantidade() {
		$sql = "SELECT COUNT(*) as contagem FROM pessoas";
		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0) {
			$sql = $sql->fetch();
			return $sql['contagem'];
		} else {
			//ZERO anuncios cadastrados;
			return 0;
		}
	} 
}