<?php

?>

<div>Buscar demandas por:<br>
	
<a href="">Rubro</a> |  <a href="">Empresa</a> | <a href="">Ciudad</a>
	
</div>

<div>Ultimas Demandas:
	
<?php

foreach ($demandas as $dem) {
	echo"<div>";
	echo "<a href='http://localhost/Encontra-Tu-Job/index.php?controlador=Demandas&accion=mostrar_demanda&dem=".$dem->getID()."'>".$dem->getTitulo()."</a>";
	echo "<hr>";
	echo"</div>";
}

?>	
	
	
</div>






<?php

?>