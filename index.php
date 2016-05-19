<?php
	//Arquivo de arranque de sistema
	require_once('Core/Core.php');
	
	use Core\Route;

	$arrPage = Route::route();

	//use Fixtures\Fixture;

	//$objFixture = new Fixture();

	//$objFixture->criarTabela();
	//$objFixture->inserirDados();