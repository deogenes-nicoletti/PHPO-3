<?php
	namespace Core\Library\SecurityRoute\Model;

	use Model\GenericModel;

	class PagPermissionModel extends GenericModel
	{
		private $strTable = "secty_pag_permission";
		private $strPrimary = "secty_cod_pag_permission";

		public function getByCodPag($intCodPagina)
		{
			$strQuery = "select * from $this->strTable where secty_cod_pag = ?";
			return $this->select($strQuery, [$intCodPagina]);
		}
	}