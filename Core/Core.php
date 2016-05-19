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