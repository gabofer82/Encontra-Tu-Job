<?php
	include __DIR__.'/../dominio/usuario.class.php';
	session_start();
	
	if (!isset($_SESSION['user'])) {
		$_SESSION['user'] = new Usuario();
		//$_SESSION['user']->setNom('Otro');
	}
?>	
		<div id="barra-usuario">
			<span>Bienvenido <?php echo $_SESSION['user']->getNom();?></span>
			<?php
			if ($_SESSION['user']->getNom() == 'Visitante') {
				echo '<form action="#" method="post" id="login-usr">
				<label>Usuario</label>
				<input type="text" name="user-name"/>
				<label>Pass</label>
				<input type="password" name="password" />
				<input type="submit" value="Ingresar"/>
			</form>';
			}else{
				echo '<span id="logout-usr"><a href="#">Salir</a></span>';
			}
?>
		</div>
