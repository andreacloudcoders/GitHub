<?php
require_once("db_connection.php");
require_once("function.php");

$c = db_connect();

if(!empty($_POST) && $_POST["mese"] != ""){
	$mese=$_POST["mese"];
	$mese=mysql_real_escape_string($mese);
	$err=0;
}else{
	$err=1;
}

if($err==0){
	$r = get_fatture_mese($mese);

	while($row = mysql_fetch_array($r)){
		$clienti = get_cliente($row["cliente"]);
		$cliente = mysql_fetch_array($clienti);
?>
		
			<tr id="<?php echo $row["numero"]; ?>">
				<td><?php echo $row["numero"]; ?></td>
				<td><?php echo $cliente["ragione_sociale"]; ?></td>
				<td><?php echo conv_date($row["data"]); ?></td>
				<td><a href="fattura.php?n=<?php echo $row["numero"]; ?>&c=<?php echo $cliente["id"]; ?>">Vedi Fattura</a></td>
			</tr>

<?php
	}
}else{
	?>
		<p>Nessun DDT presente</p>
	<?php
}

mysql_close($c);
?>