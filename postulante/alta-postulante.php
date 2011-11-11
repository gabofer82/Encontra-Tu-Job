<?php
/*<script language="javascript" type="text/javascript" src="../js/fechaNac.js"></script>
 * Esta funcion configura los select de la fecha de nacimiento no se donde iria aca para
 * que sea importada. O va en Index.html?
 */	

		<form action="#" method="post" id="AltaPostulante">
			//Aca le faltaria algo para ver la nacionalidad
			<!---->
			
			<label>Nombre de Usuario</label>
			<input type="text" id="txtUsrNomPostulante" />
			
			<!---->
			
			<label>Mail</label>
			<input type="email" id="txtMailPostulante"/>
			
			<!---->
			
			<label>Mail</label>
			<input type="email" id="txtMailPostulante"/>
			
			<!---->
			
			<label>Password</label>
			<input type="password" id="txtPassPostulante"/>
			
			<!---->
			
			<label>Reingresar Password</label>
			<input type="password" id="txtRePassPostulante"/>
			
			<!---->
			
			<label for="fecNac"> Fecha Nacimiento </label>
			<select id="anhoNac" onchange="ponerDias()">
				<script>ponerAnho();</script>
			</select>
			<select id="mesNac" onchange="ponerDias()">
				<script>ponerMes();</script>
			</select>
			<select id="diaNac">
				<script>ponerDias();</script>
			</select>
			
			<!---->
			
			<label>Sexo</label>
			<input type="radio" name="rbSexo" id="rbM" value="M" />
			<input type="radio" name="rbSexo" id="rbF" value="F" />
			
			<!---->
			
			<input type="submit" id="btnRegPost" value="Registrarse" />
			
		</form>
?>