<?php
	namespace Fixtures;

	use Model\GenericModel;

	class Fixture extends GenericModel
	{
		public function criarBanco()
		{
			$strQuery = "CREATE DATABASE IF NOT EXISTS code_education;";
			$this->execute($strQuery);
		}

		public function criarTabela()
		{
			$strQuery = "CREATE TABLE if not exists cad_pagina (
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
			$strQuery = "insert cad_pagina (dsc_nome_pagina, dsc_conteudo_pagina, dsc_lnk_page) values('Home', 'Pagina Inicial', 'inicio');";
			$strQuery .= "insert cad_pagina (dsc_nome_pagina, dsc_conteudo_pagina, dsc_lnk_page) values('produto', 'Produto', 'produto');";

			$this->execute($strQuery);
		}
	}