<?php
	//Arquivo de arranque de sistema
	require_once('Core/Core.php');
	
	use Core\Route;

	Route::staticRoute('fixtures', 'Fixtures');
	Route::route();