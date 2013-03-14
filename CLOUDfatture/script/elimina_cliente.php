<?php
require_once("db_connection.php");
require_once("function.php");

$c = db_connect();

if(!empty($_GET) && $_GET["id"] != ""){
	$id=$_GET["id"];
	$id=mysql_real_escape_string($id);
	$err=0;
}else{
	$err=1;
}

if($err==0){
	$r = elimina_cliente($id);
	if($r == 1){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../elimina_cliente.php">';    
   		exit;
	}else{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../elimina_cliente.php?e=2">';    
   		exit;
	}
}else{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../elimina_cliente.php?e=1">';    
   	exit;
}

mysql_close($c);
?>