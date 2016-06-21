<?php
	namespace Core\Library\SecurityRoute\Model;

	use Model\GenericModel;

	class UserPermissionModel extends GenericModel
	{
		private $strTable = "secty_user_permission";
		private $strPrimary = "secty_user_permission_cod";

		public function getByCodUser($intCodUser)
		{
			$strQuery = "select * from $this->strTable where secty_user_permission_cod_user = ?";
			return $this->select($strQuery, [$intCodUser]);
		}
	}