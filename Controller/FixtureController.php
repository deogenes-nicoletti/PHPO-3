<?php
	namespace Controller;

	use Core\System\GenericClassSystem;

	use Utils\RequestsUtils;
	use Utils\NotificationUtils;
	
	use Model\PaginaModel;
	use Model\FixtureModel;

	class FixtureController extends GenericClassSystem
	{
		private $objPaginaModel;
		private $objRequestsUtils;
		private $objFixtureModel;
		private $objNotificationUtils;

		public function __construct()
		{
			$this->objFixtureModel = new FixtureModel();
		}

		public function index($strFixture = null)
		{
			$boolExibirLinkAcoes = $strFixture === null ? true : false;

			if($strFixture !== null)
				$this->executar();

			$this->TemplateHelper()->loadView('fixtures/fixture', ['boolExibirLinkAcoes' => $boolExibirLinkAcoes]);
		}

		private function executar()
		{
			//Disparando rotinas
			return $this->objFixtureModel->inserirDados();
		}
	}