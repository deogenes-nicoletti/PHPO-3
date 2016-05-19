<?php
	use Model\PaginaModel;
	use Utils\RequestsUtils;
	use Utils\NotificationUtils;

	//Loading library's
	$objPaginaModel = new PaginaModel();
	
	$objRequestUtils = new RequestsUtils();
	$objNotificationUtils = new NotificationUtils();

	if(!isset($_POST['txtEnviar'])) :
		require_once(PAGES_SRC.'busca\frmBusca.html');
		return;
	endif;

	//Validando pagina
	if($objRequestUtils->isEmptyResponse('Termo'))
	{
		$objNotificationUtils->notificateToBrowser('', 'Termo não informado', true);
	}

	$arrResult = $objPaginaModel->getByConteudoContainsFrase($objRequestUtils->get('Termo'));

	require_once(PAGES_SRC . '/busca/buscaResultado.php');
?>