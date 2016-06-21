<?php
	return [
		/*
		Define o apelido da rota exemplo:
			http://localhost:8080/microFrameworkNovo/Home/321/222
			neste caso o primeiro parametro seria: microFrameworkNovo
			porém se definirmos o apelido para: microFrameworkNovo
			o código irá automaticamente entender que microFrameworkNovo é um parametro de link e não
			o primeiro parametro a ser passado para o método
		*/
		'ROTA_APELIDO' => 'code_education',

		/*
		*AUTOLOAD CLASSES
		*namespace\classe
		*/
		'AUTOLOAD_CLASSES' => [
			'Core\Helper\TemplateHelper',
			'Core\Helper\FileHelper',
			'Core\Helper\SessionHelper'
		],

		/*
		*CONFIGURAÇÃO DE BIBLIOTECAS
		*/
		'LIBRARY' => [

			/*
			* CONFIGURAÇÕES DA BIBLIOTECA SECURITY ROUTE
			*/
			'SECURITY_ROUTE' => [
				/*
				*Redireciona para rota especificada se o usuario não informar uma rota
				*ex: localhost (/?? não informou a rota), irá para: localhost/home
				*/
				'REDIRECT_NOT_ROUTE_SELECTED' => 'home',

				/*
				*Se true vai para pagina de login, se false exibe mensagem final de sistema,
				*informando a falta de autorização
				*/
				'REDIRECT_LOGIN_IF_NOT_AUTHORIZED' => true
			]
		]
	];