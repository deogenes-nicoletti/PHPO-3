<?php
	namespace Controller;
	use Core\Helper\ResourceHelper;
	use Core\System\GenericClassSystem;

	use Core\Library\SecurityRoute\Model\PagModel;

	class ProdutoController extends GenericClassSystem
	{
		private $objPaginaModel;
		private $intCodPagina = 5;

		public function __construct()
		{
			$this->objPaginaModel = new PagModel();
		}

		public function index()
		{	
			//Buscando dados
			$strDescricao = $this->objPaginaModel->getByCodPag($this->intCodPagina)[0]['secty_dsc_pag'];

			$this->TemplateHelper()->loadView('produto/inicio', ['strDescricao' => $strDescricao]);
		}
	}