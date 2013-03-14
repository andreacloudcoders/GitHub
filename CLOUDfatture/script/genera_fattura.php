<?php
require_once("db_connection.php");
require_once("function.php");

$c = db_connect();

if(!empty($_POST) && $_POST["id"] != ""){
	$id=$_POST["id"];
	$id=mysql_real_escape_string($id);
	$err=0;
}else{
	$err=1;
}

if($err==0){
	$r = genera_fattura($id);
?>
<?php
}else{
	?>
		<p>Cliente non presente</p>
	<?php
}

$numero = get_numero_fattura();
echo $numero."&c=".$id;

mysql_close($c);
?>