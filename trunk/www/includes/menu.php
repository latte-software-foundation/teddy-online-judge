<div class="post">
	<div class="navcenter">
		<a href="index.php">home</a>&nbsp;&nbsp;&nbsp;
		<?php
		if(isset($_SESSION['userID'])){
			/* is logged */

		}else{
			/* is not logged*/
			?><a href="registro.php">registro</a>&nbsp;&nbsp;&nbsp;<?php
		}
		?>
		<a href="problemas.php">problemas</a>&nbsp;&nbsp;&nbsp;
		<a href="enviar.php">enviar solucion</a>&nbsp;&nbsp;&nbsp;
		<a href="runs.php">ejecuciones</a>&nbsp;&nbsp;&nbsp;
		<a href="rank.php">rank</a>&nbsp;&nbsp;&nbsp;
		<a href="contest.php">concursos</a>&nbsp;&nbsp;&nbsp;
		<a href="faq.php">preguntas frecuentes</a>&nbsp;&nbsp;&nbsp;
	</div>
</div>

<!--
Admin menu
<div class="post">
	<div class="navcenter">
		<a href="../index.php">teddy home</a>&nbsp;&nbsp;&nbsp;
		<a href="test.php">estado</a>&nbsp;&nbsp;&nbsp;
		<a href="problemas.php">problemas</a>&nbsp;&nbsp;&nbsp;
		<a href="soluciones.php">soluciones</a>&nbsp;&nbsp;&nbsp;
		<a href="inbox.php">mensajes</a>&nbsp;&nbsp;&nbsp;
		<a href="runs.php">ejecuciones</a>&nbsp;&nbsp;&nbsp;
		<a href="usuarios.php">usuarios</a>&nbsp;&nbsp;&nbsp;
		<a href="log.php">log</a>&nbsp;&nbsp;&nbsp;
		<a href="config.php">configuracion</a>&nbsp;&nbsp;&nbsp;
	</div>
</div>
--> 
