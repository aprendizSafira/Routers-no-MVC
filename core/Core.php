<?php
/*
-- Essa arquivo não faz parte da estrutura MVC. Ele apenas inicia esse processo.
*/
class Core {

	public function run() {//run = rodar
		//Vai pegar a aquela url que esta no get
		$url = '/';//Depois do / (meusite.com.br/)
		if(isset($_GET['url'])) {
			$url.= $_GET['url'];//se foi enviado uma url concatena
		}

		//Função para aplicar o routers
		$url = $this->checkRouters($url);


		$params = array();
		//VERIFICANDO Se a pessoa enviou algun endereço do seu site
		if(!empty($url) && $url != '/') {
			//Caso ele tenha enviado um endereço especifico do site
			$url = explode('/', $url);
			//Tirando o array da posição 0, pois não serve para nada
			array_shift($url);//Remove o primeiro registro do array
			
			$currentControler = $url[0].'Controller';//fica (homeController)
			array_shift($url);//remove novamente

			//VERIFICANDO se o user enviou o action pela url
			if(isset($url[0]) &&  !empty($url[0])){//porque pode ser não ser enviado o action ou pior uma '/'
				$currentAction = $url[0];
				array_shift($url);
			} else {

				$currentAction = 'index';
			}

			
			if(count($url) > 0) {
				$params = $url;
			}

		} else {//OU SEJA: se a pessoa não enviou nada apenas o meusite.com.br/
			//Manda para o index.php
			$currentControler = 'homeController';
			$currentAction = 'index';
		}
		

		//INSTÂNCIANDO A CLASSE CONTROLLER
		$c = new $currentControler();//Pode ser contatoController-sobreController.

		//INSTÂNCIANDO a ACTION:
		//Vai pegar na classe a action que é a função que esta dentro da classe.Se não tiver parametro envia um array vazio
		call_user_func_array(array($c, $currentAction), $params);//Quando não sabe o name da função

	}


	public function checkRouters($url) {

		global $routes;

		foreach($routes as $pt => $newurl) {
			//Identifica os argumentos e substitui por regex(expressão regular)
			$pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);//Vai procurar por tudo que tiver entre {} e vai substituir o que tá dentre por uma expressão regular.
			
			//Faz o match da url
			if(preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1) {

				//Removendo os dois arquivos primeiros do matches, pois eles ñ são relevantes
				array_shift($matches);//Remove
				array_shift($matches);
				
				// Pega todos os argumentos{id}-{titulo} para associar
				$itens = array();

				if(preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)) {
					// Tirar os {}
					$itens = preg_replace('(\{|\})', '', $m[0]);

					// Faz a associação
					$arg = array();

					foreach($matches as $key => $match) {
						$arg[$itens[$key]] = $match;
					}
					
					// Monta a nova URL
					foreach($arg as $argkey => $argvalue) {
						$newurl = str_replace(':'.$argkey, $argvalue, $newurl);
					}
					
					// Substitui a nova url na antiga
					$url = $newurl;

					break;//Ele para de rodar o foreach, já que ele já achou a rota($routes)correta
				}
			}
		}
		return $url;
	}
}