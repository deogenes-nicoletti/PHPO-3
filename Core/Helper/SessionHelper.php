<?php
	namespace Core\Helper;

	class SessionHelper
	{
		public function get($strKey = null)
		{
			return isset($_SESSION[$strKey]) ? $_SESSION[$strKey] : null;
		}

		public function all()
		{
			return $_SESSION;
		}

		public function incluir($strKey, $absData)
		{
			if(isset($_SESSION[$strKey]))
				$_SESSION[$strKey][] = $absData;
			else
				$this->set($strKey, $absData);
		}

		public function set($strKey, $absData)
		{
			$_SESSION[$strKey] = $absData;
		}

		public function deleta($obj)
		{
			$tmp = &$obj;

			var_dump($tmp);
		}
	}