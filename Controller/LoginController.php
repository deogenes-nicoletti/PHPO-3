<?php
	namespace Controller;
	use Core\Helper\ResourceHelper;
	use Core\System\GenericClassSystem;
	use Core\Library\SecurityRoute\Controller\SecurityRouteController;

	class LoginController extends GenericClassSystem
	{
		private $objSecurityRouteController;

		public function __construct()
		{
			$this->objSecurityRouteController = new SecurityRouteController();
		}

		public function index(ResourceHelper $objResource)
		{
			$arrDados = $objResource->postAll();

			if(sizeof($arrDados) == 0)
				return $this->TemplateHelper()->loadView('painel/login');

			//Verificando se o usuario existe
			if($this->objSecurityRouteController->login($arrDados['Login'], $arrDados['Senha']) == true)
				$objResource->redirect('painel');
			else
				$this->TemplateHelper()->loadView('painel/login');
		}
	}