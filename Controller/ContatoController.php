<?php
	namespace Controller;
	use Core\Helper\ResourceHelper;
	use Core\System\GenericClassSystem;

	use Core\Library\SecurityRoute\Model\PagModel;

	class ContatoController extends GenericClassSystem
	{
		private $objPaginaModel;
		private $intCodPagina = 8;

		public function __construct()
		{
			$this->objPaginaModel = new PagModel();
		}

		public function index(ResourceHelper $objResource)
		{	
			//Buscando dados
			$strDescricao = $this->objPaginaModel->getByCodPag($this->intCodPagina)[0]['secty_dsc_pag'];
			$arrDados = $objResource->postAll();

			if(sizeof($arrDados) == 0)
				$this->TemplateHelper()->loadView('contato/frm', ['strDescricao' => $strDescricao]);
			else
				$this->TemplateHelper()->loadView('contato/dados', ['arrDadosRecebidos' => $arrDados]);
		}
	}