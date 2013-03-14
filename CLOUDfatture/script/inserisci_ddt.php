<?php
require_once("db_connection.php");
require_once("function.php");

$c = db_connect();

if($_POST["tabella"] != "") {
	$tabella = parse_tabella($_POST["tabella"]);
	$id_cliente = $_POST["id_cliente"];
	$err=0;
}else{
	$err=1;
}

$numero = get_numero_ddt()+1;
$data = date('Y-m-d');

if($err==0){
	foreach($tabella as $t){
		inserisci_ddt($id_cliente,$numero,$data,$t['Quantita'],$t['Codice'],$descr=NULL,$t['Prezzo']);
	}
}

echo $numero."&c=".$id_cliente;

mysql_close($c);
?>