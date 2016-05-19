<strong>
<?php
	if(sizeof($arrResult) == 0){
		echo 'nenhum resultado encontrado <a href="?pag=busca">tente novamete</a>';
		return;
	}

echo sizeof($arrResult);
?>
 </strong> Paginas encontradas para seu termo: 
<br><br>

<?php
	
	foreach ($arrResult as $key => $objResult)
	{
?>
		<p>
			<a href="?pag=<?php echo $objResult['dsc_lnk_page']; ?>"><?php echo $objResult['dsc_nome_pagina']; ?></a>
		</p>
<?php
	}
?>
