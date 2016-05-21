<?php
	namespace Controller;

	use Utils\RequestsUtils;
	use Utils\NotificationUtils;
	
	use Model\PaginaModel;
	use Model\FixtureModel;

	class FixtureController
	{
		private $objPaginaModel;
		private $objRequestsUtils;
		private $objFixtureModel;
		private $objNotificationUtils;

		public function __construct()
		{
			$this->objPaginaModel = new PaginaModel();
			$this->objRequestsUtils = new RequestsUtils();
			$this->objFixtureModel = new FixtureModel();
			$this->objNotificationUtils  = new NotificationUtils();

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

			$this->objNotificationUtils->notificateToBrowser('', 'Sucesso ao processar sua solicitação');
		}
	}