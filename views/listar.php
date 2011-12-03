<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>
<body>
<table>
	<tr>
		<th>ID
		</th><th>Item
	</th></tr>
	<?php
	// $listado es una variable asignada desde el controlador ItemsController.
	while($item = $listado->fetch())
	{
	?>
	<tr>
		<td><?php echo $item['id_item']?></td>
		<td><?php echo $item['item']?></td>
	</tr>
	<?php
	}
	?>
</table>
</body>
</html>