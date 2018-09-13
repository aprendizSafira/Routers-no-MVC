<!DOCTYPE html>
<html>
<head>
	<title>Meu site</title>
	<link href="<?php echo BASE_URL; ?>assets/css/style.css" rel="stylesheet" type="text/css" >
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
</head>
<body>
	<h1>Este é o topo</h1>
	<a href="<?php echo BASE_URL; ?>">Home</a>
	<a href="<?php echo BASE_URL; ?>galeria">Galeria</a>
	<hr/>
	<!--Esse metodo loadViewInTemplete() esta dentro da classe Controller-->
	<?php $this->loadViewInTemplete($viewName, $viewData);  ?>
</body>
</html>