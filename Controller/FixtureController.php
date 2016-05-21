<?php
	namespace Controller;

	use Utils\RequestsUtils;
	
	use Model\PaginaModel;
	use Model\FixtureModel;

	class FixtureController
	{
		private $objPaginaModel;
		private $objRequestsUtils;
		private $objFixtureModel;

		public function __construct()
		{
			$this->objPaginaModel = new PaginaModel();
			$this->objRequestsUtils = new RequestsUtils();
			$this->objFixtureModel = new FixtureModel();

			//Inicia rotinas
			$strParamFixture = $this->objRequestsUtils->get('fixture', 'GET');

			if($strParamFixture === null)
				$this->index();
			else
				$this->executar($strParamFixture);
		}

		public function index()
		{
			$strDscLink = $this->objRequestsUtils->get('pag', 'GET');
			$arrConteudoPagina = $this->objPaginaModel->getByDscLinkPagina($strDscLink);

			foreach ($arrConteudoPagina as $key => $objConteudo)
				echo $objConteudo['dsc_conteudo_pagina'];

			loadView('fixtures/lstFixtures');
		}

		private function executar($strFixture)
		{
			//Executando fixture
			$arrFixturesRegistradas = ['dados' => 'inserirDados', 'banco' => 'criarBanco', 'tabelas' => 'criarTabela'];

			foreach ($arrFixturesRegistradas as $key => $strMetodo)
				if($strFixture === $key)
					call_user_func_array([$this->objFixtureModel, $strMetodo], []);
		}
	}