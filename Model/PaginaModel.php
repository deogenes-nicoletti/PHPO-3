<?php

	namespace Model;

	use Model\GenericModel;

	Class PaginaModel extends GenericModel
	{
		private $strTable = "cad_pagina";
		private $strPrimaryKey = "cod_pagina";

		public function getAll()
		{
			$strQuery = "select * from $this->strTable";

			return $this->select($strQuery);
		}

		public function getByCodPagina($intCodPagina = null)
		{
			if($intCodPagina === null)
				return;

			$strQuery =  sprintf("select * from $this->strTable where $this->strPrimaryKey = '%d'", $intCodPagina);

			return $this->select($strQuery);
		}

		public function getByDscLinkPagina($strLinkPagina = null)
		{
			if($strLinkPagina === null)
				return;

			$strQuery = sprintf("select * from $this->strTable where dsc_lnk_page = '%s'", $strLinkPagina);

			return $this->select($strQuery);
		}

	}