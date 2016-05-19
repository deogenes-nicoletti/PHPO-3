<?php
	if(!isset($_POST['txtEnviar'])){
		return require_once(PAGES_SRC . 'form/form.html');
	}
?>

<h4 class="alert alert-success">Dados enviados com sucesso, abaixo seguem os dados que você enviou</h4>

<?php
	$arrDadosRecebidos = $_POST;

	foreach ($arrDadosRecebidos as $key => $objPost)
	{ 
		if($key == 'txtEnviar') continue;
?>
	<p><strong><?php echo $key; ?>: </strong><?php echo $objPost; ?></p>
<?php
	}