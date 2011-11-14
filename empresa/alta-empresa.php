<?php
	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
?>
	<div id="cont-variable">
		<form action="#" method="post" id="AltaEmpresa" class="formularios">
			
			<!---->
			
			<label>Nombre de Empresa</label>
			<input type="text" id="txtUsrNomEmp" />
			
			<!---->
			
			<label>Mail</label>
			<input type="email" id="txtMailEmpresa"/>
			
			<!---->
			
			<label>Password</label>
			<input type="password" id="txtPassEmp"/>
			
			<!---->
			
			<label>Reingresar Password</label>
			<input type="password" id="txtRePassEmp"/>
			
			<!--Aca hay que ver si una empresa tiene mas de un rubro-->
			<label> Rubro </label>
						
			<!--Aca hay que hacer algun tipo de combo también para desplegr las ciudades-->
			<label>Ubicación</label>
			<br />
			<!---->
			
			<input type="submit" id="btnRegEmp" value="Registrarse" class="btnSubmit" />
			
		</form>
	</div>
</div>
<?php
	include_once __DIR__.'/../templates/footer.php';
?>