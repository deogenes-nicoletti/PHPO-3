<?php
	namespace Core\Library\SecurityRoute\Controller;

	use Core\Helper\ResourceHelper;

	use Core\System\GenericClassSystem;
	use Core\Library\SecurityRoute\Model\PagModel;
	use Core\Library\SecurityRoute\Model\UserModel;
	use Core\Library\SecurityRoute\Model\UserPermissionModel;
	use Core\Library\SecurityRoute\Model\PagPermissionModel;

	class SecurityRouteController extends GenericClassSystem
	{
		private $strKeySessionUser = 'user';
		private $objSecurityPagModel;
		private $objSecurityUserModel;
		private $objSecurityUserPermissionModel;

		public function __construct()
		{
			$this->objSecurityPagModel = new PagModel();
			$this->objSecurityUserModel = new UserModel();
			$this->objSecurityUserPermissionModel = new UserPermissionModel();
			$this->objSecurityPagPermissionModel = new PagPermissionModel();
		}

		public function rotaExiste($strRota = null)
		{
			$objRetorno = $this->objSecurityPagModel->getByRota($strRota);
			return !empty($objRetorno);
		}

		public function goToLogin()
		{
			$arrConfig = loadConfig('LIBRARY')['SECURITY_ROUTE'];
			$objResourceHelper = new ResourceHelper();

			if($arrConfig['REDIRECT_LOGIN_IF_NOT_AUTHORIZED'] == false)
				fatalError("Sem autorização para: $strRota");
			else
				$objResourceHelper->redirect(url('/login'));
		}

		public function getUser()
		{
			return $this->SessionHelper()->get($this->strKeySessionUser);
		}

		private function setUser($objUser)
		{
			$this->SessionHelper()->set($this->strKeySessionUser, $objUser);
		}

		public function login($strLogin, $strSenha)
		{
			$objRetorno = $this->objSecurityUserModel->getByLoginPassword($strLogin, $strSenha);

			if($objRetorno == null)
				return false;

			$this->setUser($objRetorno);
			return true;
		}

		public function rotaAutorizada($strRota)
		{
			//Pegando usuario
			$objUsuario = $this->getUser();

			//Pegando rota
			$objRota = $this->objSecurityPagModel->getByRota($strRota)[0];

			if($objRota['secty_ind_force_login'] == 0)
				return true;
			else if(empty($objUsuario) == true)
				return false;

			//Pegando permissoes de usuario
			$arrPermissoesUsuario = $this->objSecurityUserPermissionModel->getByCodUser($objUsuario['secty_cod_user']);

			if(sizeof($arrPermissoesUsuario) == 0)
				return false;

			//Pegando permissoes de rota
			$arrPermissoesRota = $this->objSecurityPagPermissionModel->getByCodPag($objRota['secty_cod_pag']);
			$arrPermissionCodeRota = [];

			foreach ($arrPermissoesRota as $key => $objRotaPermission)
				$arrPermissionCodeRota[] = $objRotaPermission['secty_permission_cod'];

			//De usuario para rota
			foreach ($arrPermissoesUsuario as $key => $objUsuPermissao)
				if(in_array($objUsuPermissao['secty_user_permission_cod_permission'], $arrPermissionCodeRota))
					return true;

			return false;
		}
	}