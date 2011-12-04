<?php
include 'lang/es.php';
	/*$objU = EmpresaAdmin::getInstance() ;
	$GLOBALS['adminEmpresa'] = &$objU;
	$gestora = EmpresaAdmin::getInstance();*/
?>
<div id="cont-variable">
	<h4>Alta exitosa</h4>
	<p>Aqui debe ir el perfil de la empresa</p>
	<?php
	while($item = $info->fetch())
	{
	?>
	<ul>
		<li><?php echo $item['emp_id']?></li>
		<li><?php echo $item['emp_nom']?></li>
	</ul>
	<?php
	}
	?>
</div>
</div>
