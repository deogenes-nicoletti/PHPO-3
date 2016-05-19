<?php
	namespace Model;

	class GenericModel
	{
		private $strBanco = "mysql";
		private $strHost  = "localhost";
		private $strSchema = "code_education";
		private $strUser = "root";
		private $strPwd = "";

		private $conn = null;

		public function __construct()
		{
			try{
				$this->conn = new \PDO("$this->strBanco:host=$this->strHost;dbname=$this->strSchema", $this->strUser, $this->strPwd);
			}
			catch(\PDOException $e){
				
				if($e->getCode() == PDO_NOT_DATABASE_EXISTS)
					$this->conn = new \PDO("$this->strBanco:host=$this->strHost", $this->strUser, $this->strPwd);					
				else
					die("ERRO: " . $e->getMessage());
			}
		}

		public function __destruct()
		{
			$this->conn = null;
		}

		public function select($strQuery = null, $param = null)
		{
			if($strQuery == null)
				return;

			//Preparing query
			$query = $this->conn->prepare($strQuery);

			if(is_array($param) == false && $param !== null)
				$param = [ $param ];

			for($i = 0; $i < sizeof($param); ++$i)
				$this->conn->bindValue($i -1, $param[$i]);

			//Execute
			$query->execute();

			//Fetch All
			$rs = $query->fetchAll(\PDO::FETCH_ASSOC);

			return $rs;
		}

		public function execute($strQuery = null)
		{
			$query = $this->conn->prepare($strQuery);

			//Executing query
			$query->execute();
		}
	}