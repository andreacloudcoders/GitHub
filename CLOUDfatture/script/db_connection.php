<?php	
	function db_connect(){
		$c = mysql_connect('127.0.0.1', 'root', '')
		//$c = mysql_connect('mysql.cloudcoders.org', 'cloudcoders', 'ukugloli')
			or die ("<script>alert('".mysql_error()."');</script>");		
		//mysql_select_db('gestio')
		mysql_select_db('gestio_edilgiaveno')
			or die ("<script>alert('".mysql_error()."');</script>");
		mysql_query("SET NAMES 'utf8'");
		mysql_query("set time_zone = 'Europe/Rome'");
			
		return $c;
	}

?>
