<?php
require_once("db_connection.php");
require_once("function.php");

$c = db_connect();

if(!empty($_POST) && $_POST["rs"] != "" && $_POST["piva"] != "" && $_POST["citta"] != "" && $_POST["cap"] != "" && $_POST["indirizzo"] != "" && $_POST["prov"] != ""){
	$id=$_POST["id"];
	$id=mysql_real_escape_string($id);
	$rs=$_POST["rs"];
	$rs=mysql_real_escape_string($rs);
	$piva=$_POST["piva"];
	$piva=mysql_real_escape_string($piva);
	$citta=$_POST["citta"];
	$citta=mysql_real_escape_string($citta);
	$cap=$_POST["cap"];
	$cap=mysql_real_escape_string($cap);
	$indirizzo=$_POST["indirizzo"];
	$indirizzo=mysql_real_escape_string($indirizzo);
	$prov=$_POST["prov"];
	$prov=mysql_real_escape_string($prov);
	$err=0;
}else{
	$err=1;
}

if($err==0){
	$r = modifica_cliente($id,$rs,$piva,$citta,$cap,$indirizzo,$prov);
	if($r == 1){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../elimina_cliente.php">';    
   		exit;
	}else{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../modifica_cliente.php?e=2">';    
   		exit;
	}
}else{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../modifica_cliente.php?e=1">';    
   	exit;
}

echo $err;
echo $r;
echo $rs;

mysql_close($c);
?>