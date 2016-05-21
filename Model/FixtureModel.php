<?php
	namespace Model;

	use Model\GenericModel;

	class FixtureModel extends GenericModel
	{
		public function criarBanco()
		{
			$strQuery = "CREATE DATABASE IF NOT EXISTS code_education;";
			$this->execute($strQuery);

			parent::__construct();
		}

		public function criarTabela()
		{
			$this->criarBanco();

			$strQuery = "DROP TABLE if exists cad_pagina;";

			$strQuery .= "CREATE TABLE if not exists cad_pagina (
				cod_pagina int primary key not null auto_increment,
    			dsc_nome_pagina varchar(255),
    			dsc_conteudo_pagina text,
    			source_page VARCHAR(255),
    			dsc_lnk_page varchar(255) UNIQUE
				);";

			$this->execute($strQuery);
		}

		public function inserirDados()
		{
			$this->criarTabela();

			$strQuery = "TRUNCATE `cad_pagina`; ";

			$strQuery .= "INSERT INTO `cad_pagina` VALUES (1,'Home','Pagina Inicial','home.php','home'),(2,'produto','Produto','produto.php','produto'),(3,'Empresa','Empresa','empresa.php','empresa'),(4,'Serviços','Serviço','servico.php','servico'),(5,'Contato','Contato','contato.php','contato'),(6,'Busca','Busca','busca/busca.php','busca'),(7,'Fixtures','<p>Aqui você pode ver todas as fixtures disponiveis</p>','fixtures.php','fixtures');";

			$this->execute($strQuery);
		}
	}