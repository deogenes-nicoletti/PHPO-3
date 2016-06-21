<?php
	namespace Core\Helper;

	class ListHelper
	{
		private $arrList;

		public function __construct($arrList = null)
		{
			$this->arrList = $arrList;
		}

		public function all()
		{
			return $this->arrList;
		}

		public function pop()
		{
			$intLastIndex = $this->getLastIndex();

			if($this->checkIndex($intLastIndex) == true)
			{
				$arrTmp = array_splice($this->arrList, 0, -1);
				$this->arrList = $arrTmp;
			}
		}

		private function checkIndex($intIndex)
		{
			return isset($this->arrList[$intIndex]);
		}

		private function getLastIndex()
		{
			return $this->length() == 0 ? 0 : $this->length() - 1;
		}

		public function length()
		{
			return sizeof($this->arrList);
		}

		public function last()
		{
			$intLastIndex = $this->getLastIndex();

			if($this->checkIndex($intLastIndex) == true)
				return $this->arrList[$intLastIndex];
			else
				return null;
		}
	}