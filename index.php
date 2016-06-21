<?php
	//Arquivo de arranque de sistema
	require_once('Core/Core.php');

	use Core\Route;

	Route::get('fixtures', 'FixtureController@index', true);
	
	//Rota padrão para SecurityRoute
	Route::get('login', 'LoginController@index', true);

	Route::get('home', 'HomeController@index');
	
	/*
	*FUTURA IMPLEMENTACAO: DIRETIVA DE SEGURANÇA A ROTA POR GRUPOS
	*Target: Route, implementation: Library => SecurityRoute
	*Route::group('administradores', function(){
		Route::get('painelAdmin', 'PainelController@index');
		Route::get('painelDono', 'PainelController@index');
	});
	*/

	Route::get('painel', 'PainelController@index');
	Route::get('editar-paginas', 'PainelController@editar');

	Route::get('produto', 'ProdutoController@index');
	Route::get('empresa', 'EmpresaController@index');
	Route::get('servico', 'ServicoController@index');
	Route::get('contato', 'ContatoController@index', true);
	Route::get('busca', 'BuscaController@index', true);
