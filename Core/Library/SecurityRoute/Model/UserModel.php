<?php
	namespace Core\Library\SecurityRoute\Model;

	use Model\GenericModel;

	class UserModel extends GenericModel
	{
		private $strTable = "secty_user";
		private $strPrimary = "secty_cod_user";

		public function getByLoginPassword($strLogin, $strPassword)
		{
			$strQuery = "select * from $this->strTable 
			join secty_user_permission on secty_user_permission.secty_user_permission_cod_user = $this->strTable.$this->strPrimary
			where secty_dsc_login = ?";

			$arrRetorno = $this->select($strQuery, [$strLogin]);

			foreach ($arrRetorno as $key => $objRetorno)
				if(password_verify($strPassword, $objRetorno['secty_dsc_pass']) == true)
					return $objRetorno;

			return null;
		}
	}