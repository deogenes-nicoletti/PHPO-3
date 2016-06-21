<?php
	namespace Model;

	use Core\Helper\FileHelper;
	use Core\Helper\ResourceHelper;

	class GenericModel
	{
		private $strBanco = "mysql";
		//private $strSchema = "u429838172_progs";
		//private $strUser = "u429838172_deoge";
		//private $strPwd = "deogeness";
		private $strSchema = "code_education";
		private $strHost  = "localhost";
		private $strUser = "root";
		private $strPwd = "";

		private $conn = null;

		public function __construct()
		{
			try{
				$this->conn = new \PDO("$this->strBanco:host=$this->strHost;dbname=$this->strSchema", $this->strUser, $this->strPwd);
			}
			catch(\PDOException $e){
				if($e->getCode() == PDO_NOT_DATABASE_EXISTS){
					$this->conn = new \PDO("$this->strBanco:host=$this->strHost", $this->strUser, $this->strPwd);
					$this->avisoFixture();
				}
				else
					die("ERRO: " . $e->getMessage());
			}
		}

		private function avisoFixture()
		{
			$objFileHelper = new FileHelper();
			$objResourceHelper = new ResourceHelper();

			if($objResourceHelper->getController() != 'fixtures')
				die($objFileHelper->incluir(PAGES_SRC."fixture.php"));
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
				//$this->conn->bindValue($i -1, $param[$i]);
				$query->bindParam($i + 1, $param[$i]);

			//Execute
			$query->execute();

			//Fetch All
			$rs = $query->fetchAll(\PDO::FETCH_ASSOC);

			return $rs;
		}

		//EM TESTES
		public function selectDemo($strQuery = null, $param = null)
		{
			$objTeste = new Query();
			$objTeste->objResult = $this->select($strQuery, $param);
			return $objTeste;
		}

		public function execute($strQuery = null)
		{
			$query = $this->conn->prepare($strQuery);

			//Executing query
			$query->execute();
		}
	}

	//Futuramente pode ser uma classe auxiliar de consultas
	class Query
	{
		protected $objResult;

		public function get(){
			return $this->objResult;
		}

		public function first()
		{
			if(is_array($objResult) && sizeof($objResult) > 0)
				return $objResult[0];
			else
				return $objResult;
		}
	}