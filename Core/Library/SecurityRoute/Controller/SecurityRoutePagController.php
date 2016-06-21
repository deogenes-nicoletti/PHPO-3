<?php
	namespace Core\Library\SecurityRoute\Controller;

	use Core\System\GenericClassSystem;
	use Core\Library\SecurityRoute\Model\PagModel;

	class SecurityRoutePagController extends GenericClassSystem
	{
		private $objSecurityRoutePagModel;

		public function __construct()
		{
			$this->objSecurityRoutePagModel = new PagModel();
		}

		public function atualizarDescricao($strDesc, $intCodPagina)
		{
			$this->objSecurityRoutePagModel->atualizarDescricaoByCodPag($strDesc, $intCodPagina);
		}

		public function getTodasPaginas()
		{
			return $this->objSecurityRoutePagModel->getAll();
		}
	}