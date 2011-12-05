<?php

?>

<div>Buscar demandas por:<br>
	
<a href="">Rubro</a> |  <a href="">Empresa</a> | <a href="">Ciudad</a>
	
</div>

<div>Ultimas Demandas:
	
<?php

foreach ($demandas as $dem) {
	
	echo $dem->getTitulo();
	echo "<hr>";
	
}

?>	
	
	
</div>






<?php

?>