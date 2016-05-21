<?php
	define('PAGES_SRC', 'View/');
	define('LAYOUT_SRC', PAGES_SRC . 'layout/');

	define('PDO_NOT_DATABASE_EXISTS', 1049);

	use Core\Route;

	/*
	*@date 21/03/2016
	*@return
	*@description AUTOLOAD CLASSES
	*/
	function __autoload($strClass)
	{
		if(file_exists($strClass . '.php'))
			require_once($strClass . '.php');
	}

	/*
	*@date 21/05/2016
	*@return
	*@description CARREGA UMA VIEW PASSANDO PARAMETROS (Em testes)
	*/
	function loadView($strView = '', $arrParams = null)
	{
		$arrExtensoesDefault = ['.php', '.html'];
		
		$strCaminhoFinal = null;

		foreach ($arrExtensoesDefault as $key => $strExtensao)
			if(file_exists(PAGES_SRC.$strView.$strExtensao)){
				$strCaminhoFinal = PAGES_SRC.$strView.$strExtensao;
				break;
			}

		if($strCaminhoFinal === null)
			$strCaminhoFinal = PAGES_SRC.$strView;

		if($arrParams !== null && is_array($arrParams))
			extract($arrParams);

		if(file_exists($strCaminhoFinal) == false)
			fatalError('Arquivo: '.$strCaminhoFinal.' não existe');

		require_once($strCaminhoFinal);
	}

	/*
	*@date 21/05/2016
	*@return
	*@description MATA O SISTEMA INFORMANDO A MENSAGEM
	*/
	function fatalError($strMessage = ''){
		die($strMessage);
	}