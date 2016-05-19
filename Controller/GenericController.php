<?php
	namespace Controller;

	use Model\PaginaModel;

	class GenericController
	{
		private $paginaModel;

		public function __construct()
		{
			$this->paginaModel = new PaginaModel();
		}

		public function getConteudoByCodPagina($intCodPagina = null)
		{
			if($intCodPagina === null)
				return;

			$objResult = $this->paginaModel->getByCodPagina($intCodPagina);

			if(sizeof($objResult) > 0)
				return $objResult[0]['dsc_conteudo_pagina'];
			else
				return null;
		}

		public function getConteudoByLinkPagina($strLinkPagina = null)
		{
			if($strLinkPagina == null)
				return;

			$objResult = $this->paginaModel->getByDscLinkPagina($strLinkPagina);

			if(sizeof($objResult) == 0)
				return null;
			else
				return $objResult[0]['dsc_conteudo_pagina'];
		}
	}
