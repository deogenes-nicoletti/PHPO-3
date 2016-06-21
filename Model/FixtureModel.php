<?php
	namespace Model;

	use Model\GenericModel;
	use Core\Helper\FileHelper;

	class FixtureModel extends GenericModel
	{
		private $objFileHelper;

		public function __construct()
		{
			parent::__construct();
			$this->objFileHelper = new FileHelper();
		}

		public function inserirDados()
		{
			/*$this->criarTabela();

			$strQuery = "TRUNCATE `cad_pagina`; ";

			$strQuery .= "INSERT INTO `cad_pagina` VALUES (1,'Home','Pagina Inicial','home.php','home'),(2,'produto','Produto','produto.php','produto'),(3,'Empresa','Empresa','empresa.php','empresa'),(4,'Serviços','Serviço','servico.php','servico'),(5,'Contato','pagina de contato','contato.php','contato'),(6,'Busca','Busca','busca/busca.php','busca'),(7,'Fixtures','<p>Aqui você pode ver todas as fixtures disponiveis</p>','fixtures.php','fixtures');";

			$this->execute($strQuery);*/

			//Carregando .sql
			$strSql = $this->objFileHelper->getContent(CORE_STORAGE_DATABASE."default/code_education.sql");
			$this->execute($strSql);
		}
	}