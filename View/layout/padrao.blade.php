<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" >
	<title>@parte('title');</title>
	<link rel="stylesheet" type="text/css" href="{{url('/assets/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/assets/bootstrap/css/bootstrap-responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/assets/css/index.css')}}">
</head>
<body>

<header class="navbar navbar-inverse navbar-fixed-top">
	<article class="navbar-inner">
		<section class="container">
			<nav class="nav-collapse collapse">
				<a class="brand">Projeto1</a>
				<ul class="nav">
					<li class="active"><a href="{{url('/home')}}">Home</a></li>
					<li><a href="{{url('/empresa')}}">Empresa</a></li>
					<li><a href="{{url('/produto')}}">Produtos</a></li>
					<li><a href="{{url('/servico')}}">Serviços</a></li>
					<li><a href="{{url('/contato')}}">Contato</a></li>
					<li><a href="{{url('/busca')}}">Busca</a></li>
					<li><a href="{{url('/fixtures')}}">Fixtures</a></li>
					<li><a href="{{url('/login')}}">Login</a></li>
				</ul>
			</nav>
		</section>
	</article>
</header>

<article class="container margin-top-5 conteudo-main">
	@parte('meio');
</article>

<footer class="navbar navbar-inverse navbar-fixed-bottom">
	<article class="navbar-inner">
		<section class="container">
			<nav class="nav-collapse collapse">
				<ul class="nav">
					<li><a href="">Todos os direitos reservados - <?php echo date('Y'); ?></a></li>
				</ul>
			</nav>
		</section>
	</article>
</footer>

</body>
</html>