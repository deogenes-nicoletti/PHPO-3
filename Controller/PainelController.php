<?php
	namespace Controller;

	use Core\System\GenericClassSystem;
	use Core\Library\SecurityRoute\Controller\SecurityRoutePagController;
	use Core\Helper\ResourceHelper;

	class PainelController extends GenericClassSystem
	{
		private $objSecurityPagController;

		public function __construct()
		{
			$this->objSecurityPagController = new SecurityRoutePagController();
		}

		public function index()
		{
			//print_r($this->SessionHelper()->all());
			$this->TemplateHelper()->loadView('painel/painel');
		}

		public function editar($intCodPag = null, $boolAcao = null)
		{
			if($boolAcao !== null)
				return $this->salvar($intCodPag);

			$arrPaginas = $this->objSecurityPagController->getTodasPaginas();
			$objPagAtual = null;

			if($intCodPag !== null){
				foreach ($arrPaginas as $key => $objPagina)
					if($objPagina['secty_cod_pag'] == $intCodPag)
						$objPagAtual = $objPagina;
			}
			else{
				reset($arrPaginas);
				$objPagAtual = $arrPaginas[key($arrPaginas)];
			}

			$this->TemplateHelper()->loadView('painel/editarPaginas', ['arrPaginas' => $arrPaginas, 'objPagAtual' => $objPagAtual]);
		}

		private function salvar($intCodPag)
		{
			$objResource = new ResourceHelper();
			$arrRequest = $objResource->postAll();
			$strConteudo = $arrRequest['conteudo'];

			//Salvando alterações
			$this->objSecurityPagController->atualizarDescricao($strConteudo, $intCodPag);
		}
	}