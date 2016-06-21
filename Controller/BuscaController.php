<?php
	namespace Controller;
	use Core\Helper\ResourceHelper;
	use Core\System\GenericClassSystem;

	use Model\PaginaModel;

	class BuscaController extends GenericClassSystem
	{
		public function __construct()
		{
		}

		public function index()
		{	
			$this->TemplateHelper()->loadView('busca/busca');
		}
	}