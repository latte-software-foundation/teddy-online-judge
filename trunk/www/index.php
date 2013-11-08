<?php 
	require_once("../serverside/bootstrap.php");

	define("PAGE_TITLE", "Problemas");

	require_once("includes/head.php");

?>
	<div class="post_blanco">
		<div align="center" >
			<h2>Bienvenido a Teddy</h2>
			<b><?php echo mysql_num_rows( mysql_query("SELECT * FROM `Ejecucion`") ); ?></b> ejecuciones &nbsp; 
			<b><?php echo mysql_num_rows( mysql_query("SELECT * FROM `Usuario`") );   ?></b> usuarios &nbsp; 
			<b><?php echo mysql_num_rows( mysql_query("SELECT * FROM `Problema` WHERE publico = 'SI'") ); ?></b> problemas &nbsp; 
			<b><?php echo mysql_num_rows( mysql_query("SELECT * FROM `Concurso`") ); ?></b> concursos 
		</div>
		<table>
		<tr>
		<td style="text-align:justify;">
		<br>
		    	<p>Teddy es un oso de peluche, como se puede apreciar en la figura 1.0. Lo que lo distingue de los dem&aacute;s peluches es que Teddy sabe programar.
			<br><br>
			Introducido al mundo de la programaci&oacute;n a la tierna edad de d&iacute;a y medio de haber sido fabricado, Teddy es uno de los programadores m&aacute;s h&aacute;biles, habiendo resuelto todos los problemas del mundo. Conoce todos los trucos y t&eacute;cnicas para convertir un problema aparentemente imposible en algo tan sencillo que hasta un oso podr&iacute;a resolver.
			<br><br>
			Hoy en d&iacute;a, Teddy dedica su tiempo libre a ayudar a los programadores a resolver sus propios problemas, y les ofrece un reto cada semana para que practiquen. 
			<br><br>
			Teddy no tiene dificultad evaluando c&oacute;digo en C/C++, Java, Python, PHP, VisualBasic.NET (aunque VisualBasic 6 no es de su particular agrado), C# o Perl.
			<br><br>
			Teddy ir&aacute; llevando un conteo de qu&eacute; problemas ha resuelto cada quien, y en cu&aacute;nto tiempo. Si logras acumular una cantidad considerable de puntos, quien sabe... 

			<!-- &iexcl;Teddy te podr&iacute;a dar una sorpr<a href="h.php">e</a>sa! -->
			&iexcl;Teddy te podr&iacute;a dar una sorpresa!
			</p>
		</td>
		<td valign="top">
			<img style="border: 1px" src="img/teddy.jpg">
		</td>
		</tr>
		</table>
		<div align="center" >
		<div class="botonAzul">Quiero practicar</div>
		<div class="botonAzul">Quiero organizar un concurso</div>
		</div >
	</div>

	<div class="post">
		<div align="center"><h2>Ultimas Noticias</h2></div>
		<!--
<div class="fb-like-box" data-href="http://www.facebook.com/TeddyOnlineJudge" data-width="1300" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
		-->
		<ul>
		<?php 
		$res = mysql_query("select * from Aviso order by fecha desc limit 10"); 
		while($row = mysql_fetch_array($res)){
			print("<li><b>". $row["fecha"] . "</b> " .$row["aviso"] ."</li>");
		} 
		?>
		</ul>
		<br>

		<div align="center">
		</div>
	</div>

	<div class="post_blanco">
		
		<div align="center"><h2>Estadisticas</h2></div>
		<div align ="center">
		<?php
		$java = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion` WHERE LANG = 'JAVA'") );
		$c = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion` WHERE LANG = 'C'") );
		$cpp = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion` WHERE LANG = 'C++'") );
		$perl = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion` WHERE LANG = 'Perl'") );
		$python = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion` WHERE LANG = 'Python'") );
		$php = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion` WHERE LANG = 'Php'") );
		/*
		SELECT COUNT( * ) AS  `Filas` ,  `status` 
		FROM  `Ejecucion` 
		GROUP BY  `status` 
		ORDER BY  `status`
		*/
		$total = $java + $c + $cpp + $perl + $python;
		if($total == 0) $total = 1;
		$java = ($java * 100)/$total;
		$c = ($c * 100)/$total;
		$cpp = ($cpp * 100)/$total;
		$perl = ($perl * 100)/$total;
		$python = ($python * 100)/$total;
		$php = ($php * 100)/$total;
		?>
		<img src="http://chart.apis.google.com/chart?
			chs=400x200
		&amp;	chtt=Lenguajes+usados
		&amp;	chd=t:<?php print($java.','.$c.','.$cpp.','.$python.','.$perl); ?>
		&amp;	cht=p
		&amp;	chl=Java|C|Cpp|Python|Perl"
		alt="Lenguajes enviados a Teddy" />

		<?php
		$ok = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion` WHERE status = 'OK'") );
		$tiempo = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion` WHERE status = 'TIEMPO'") );
		$compilacion = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion` WHERE status = 'COMPILACION'") );
		$runtime = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion` WHERE status = 'RUNTIME_ERROR'") );
		$wrong = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion` WHERE status = 'INCORRECTO'") );
		$total = mysql_num_rows( mysql_query("SELECT LANG FROM `Ejecucion`") );

		$otros = $total - ($ok+$tiempo+$compilacion+$runtime+$wrong);

		$ok = ($ok * 100)/$total;
		$tiempo = ($tiempo * 100)/$total;
		$compilacion = ($compilacion * 100)/$total;
		$runtime = ($runtime * 100)/$total;
		$wrong = ($wrong * 100)/$total;
		$otros = ($otros * 100)/$total;

		?>

		<img src="http://chart.apis.google.com/chart?
			chs=400x200
		&amp;	chtt=Status+de+envios
		&amp;	chd=t:<?php print($ok.','.$wrong.','.$tiempo.','.$compilacion.','.$runtime.','.$otros); ?>
		&amp;	cht=p
		&amp;	chl=Aceptado|Incorrecto|Tiempo|Compilacion|Runtime+Error|Otros"
		alt="Lenguajes enviados a Teddy" />

	<?php
		//$res = mysql_query("SELECT LANG FROM `Ejecucion` WHERE fecha = '" .  ."'");
		$days = 6;
		$data_for_chart  = "";
		$data_for_chart_dates  = "";

		while ( $days >= 0 )
		{
			$dia  = mktime(0, 0, 0, date("m")  , date("d")-$days, date("Y"));
			$res = mysql_query("SELECT execID, fecha FROM `Ejecucion` WHERE fecha like '" . date("Y-m-d", $dia) . " %:%:%'");
			$data_for_chart .= mysql_num_rows($res) . ",";
			$data_for_chart_dates .= date("M+d|", $dia);	
			$days -- ;
		}

		$data_for_chart = substr($data_for_chart , 0, strlen($data_for_chart) - 1 );
		$data_for_chart_dates = substr($data_for_chart_dates , 0, strlen($data_for_chart_dates) - 1 );
	?>
	</div>
<br>

	<div align="center">
		<img src="http://chart.apis.google.com/chart?
			chs=400x200
		&amp;	chtt=Envios+de+los+ultimos+7+dias
		&amp;	cht=ls
		&amp;	chd=t:<?php echo $data_for_chart; ?>
		&amp;	chds=0,100
		&amp;	chg=20,20
		&amp;	chm=N,000000,0,-1,11
		&amp;	chxt=x,y
		&amp;	chco=0000FF
		&amp;	chl=<?php echo $data_for_chart_dates; ?>"
		alt="Lenguajes enviados a Teddy" />
	
		<?php
			$days = 6;
			$data_for_chart  = "";
			$data_for_chart_dates  = "";

			while ( $days >= 0 )
			{
				$dia  = mktime(0, 0, 0, date("m") - $days , date("d") , date("Y"));

				$res = mysql_query("sELECT count(execID) FROM `Ejecucion` WHERE fecha like '" . date("Y-m", $dia) . "-% %:%:%'");
				$row = mysql_fetch_array($res);
				$data_for_chart .= $row[0] . ",";
				$data_for_chart_dates .= date("M|", $dia);	
				$days -- ;
			}

			$data_for_chart = substr($data_for_chart , 0, strlen($data_for_chart) - 1 );
			$data_for_chart_dates = substr($data_for_chart_dates , 0, strlen($data_for_chart_dates) - 1 );
		?>

			<img src="http://chart.apis.google.com/chart?
				chs=400x200
				&amp;	chtt=Envios+de+los+ultimos+meses
				&amp;	cht=ls
				&amp;	chd=t:<?php echo $data_for_chart; ?>
				&amp;	chds=0,1000
				&amp;	chg=20,20
				&amp;	chm=N,000000,0,-1,11
				&amp;	chxt=x,y
				&amp;	chco=0000FF
				&amp;	chl=<?php echo $data_for_chart_dates; ?>"
				alt="Envios a Teddy" />

	</div>
	</div>
	<?php include_once("includes/footer.php"); ?>
