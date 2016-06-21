<?php
	namespace Core\Library\SecurityRoute\Model;

	use Model\GenericModel;

	class PagModel extends GenericModel
	{
		private $strTable = "secty_pag";
		private $strPrimaryTable = "secty_cod_pag";

		public function getByCodPag($intCodPag)
		{
			$strQuery = "select * from $this->strTable where $this->strPrimaryTable = ?";
			return $this->select($strQuery, [$intCodPag]);
		}

		public function getByRota($strRota)
		{
			$strQuery = "select * from $this->strTable where secty_route_pag = ?";
			return $this->select($strQuery, $strRota);
		}

		public function getAll()
		{
			$strQuery = "select * from $this->strTable";
			return $this->select($strQuery);
		}

		public function atualizarDescricaoByCodPag($strDescricao, $intCodPag)
		{
			$strQuery = "UPDATE $this->strTable SET secty_dsc_pag = '$strDescricao' WHERE $this->strPrimaryTable = $intCodPag";
			$this->execute($strQuery);
		}
	}