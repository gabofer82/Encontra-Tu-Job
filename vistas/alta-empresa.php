<?php
	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
	include __DIR__.'/../dominio/empresa_admin.class.php';
		
	$gestora = EmpresaAdmin::getInstance();
	
	function AltaEmpresa() {

		$gestora.alta($_POST['txtUsrNomEmp'],$_POST['txtRUTEmp'],	$_POST['txtMailEmpresa'],
		$_POST['txtPassEmp'],$_POST['txtDirEmp'],$_POST['txtRubroIDEmp'],
		$_POST['txtCiudadEmp']);
		
	}
	
?>
	<div id="cont-variable">
		<form action='<?phpAltaEmpresa();?>' method="post" id="AltaEmpresa" class="formularios">
			
			<!---->
			
			<label>Nombre de Empresa</label>
			<input type="text" id="txtUsrNomEmp" />
			
			<!---->
			
			<!---->
			
			<label>RUT</label>
			<input type="text" id="txtRUTEmp" />
			
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
			<input type="text" id="txtRubroIDEmp" />
						
			<!--Aca hay que hacer algun tipo de combo también para desplegr las ciudades-->
			<label>Ubicaci&oacute;n</label>
			<input type="text" id="txtCiudadEmp" />
			
						<label>Direccion</label>
			<input type="text" id="txtDirEmp" />
						
			<br />
			<!---->
			
			<input type="submit" id="btnRegEmp" value="Registrarse" class="btnSubmit" />
			
		</form>
	</div>
</div>
<?php
	include_once __DIR__.'/../templates/footer.php';
?>