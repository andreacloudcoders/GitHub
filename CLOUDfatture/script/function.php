<?php
date_default_timezone_set('Europe/Rome');

function conv_date ($data){
  list ($y, $m, $d) = explode ("-", $data);
  return "$d/$m/$y";
}

// // CONVERTE LA DATA DAL FORMATO TIME A QUELLO "UMANO" // 
function convertiDataTime($dataTime) { $data = date("j/m/Y", $dataTime); $ora = date("H:i", $dataTime); $ieri = date("j/m/Y", mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"))); $oggi = date("j/m/Y", mktime(0, 0, 0, date("m"), date("d"), date("Y"))); if ($data == $ieri) $dataOk = "Ieri alle"; elseif ($data == $oggi) $dataOk = "Oggi alle"; else $dataOk = $data; return("$dataOk $ora"); }

function inserisci_cliente($rs,$piva,$citta,$cap,$indirizzo,$prov,$tel=NULL){
	$sql = "INSERT INTO clienti (ragione_sociale,p_iva,citta,cap,indirizzo,provincia,telefono) VALUES ('$rs','$piva','$citta','$cap','$indirizzo','$prov','$tel')";
	$r = mysql_query($sql) or die (mysql_error());
	return $r;
}

function get_all_clienti(){
	$sql = "SELECT * FROM clienti ORDER BY ragione_sociale";
	$r = mysql_query($sql) or die (mysql_error());
	return $r;
}

function get_cliente($id){
	$sql = "SELECT * FROM clienti WHERE id = $id";
	$r = mysql_query($sql) or die (mysql_error());
	return $r;
}

function elimina_cliente($id){
	$sql = "DELETE FROM clienti WHERE id=$id";
	$r = mysql_query($sql) or die (mysql_error());
	return $r;
}

function modifica_cliente($id,$rs,$piva,$citta,$cap,$indirizzo,$prov,$tel=NULL){
	$sql = "UPDATE clienti SET ragione_sociale = '$rs', p_iva = '$piva', citta = '$citta', indirizzo = '$indirizzo', cap = '$cap', provincia = '$prov', telefono = '$telefono' WHERE id=$id";
	$r = mysql_query($sql) or die (mysql_error());
	return $r;
}

//ritorna un array che contiene le righe della tabella
function parse_tabella($html){
  // Find the table
  preg_match("/<table.*?>.*?<\/[\s]*table>/s", $html, $table_html);
 
  // Get title for each row
  preg_match_all("/<th.*?>(.*?)<\/[\s]*th>/", $table_html[0], $matches);
  $row_headers = $matches[1];
 
  // Iterate each row
  preg_match_all("/<tr.*?>(.*?)<\/[\s]*tr>/s", $table_html[0], $matches);
 
  $table = array();
 
  foreach($matches[1] as $row_html){
    preg_match_all("/<td.*?>(.*?)<\/[\s]*td>/", $row_html, $td_matches);
    $row = array();
    for($i=0; $i<count($td_matches[1]); $i++){
      $td = strip_tags(html_entity_decode($td_matches[1][$i]));
      $row[$row_headers[$i]] = $td;
    }
 
    if(count($row) > 0)
      $table[] = $row;
  }
  return $table;
}

function inserisci_ddt($cliente,$numero,$data,$quantita,$codice,$descr='NULL',$prezzo){
	$sql = "INSERT INTO ddt (cliente,numero,data,quantita,codice,descrizione,prezzo) VALUES ($cliente,$numero,'$data','$quantita','$codice','$descr','$prezzo')";
	$r = mysql_query($sql) or die (mysql_error());
	return $r;
}

function get_numero_ddt(){
	$sql = "SELECT COUNT(DISTINCT numero) FROM ddt;";
	$r = mysql_query($sql);
	$c = mysql_fetch_array($r) or die (mysql_error());
	$c = $c[0];
	return $c;
}

function get_ddt($n){
	$sql = "SELECT * FROM ddt WHERE numero = $n";
	$r = mysql_query($sql) or die (mysql_error());
	return $r;
}

function get_ddt_mese($mese){
	$anno = date( "Y",time());
	
	$sql = "SELECT DISTINCT numero, cliente, data FROM ddt WHERE data LIKE '".$anno."-".$mese."%'";
	$r = mysql_query($sql) or die (mysql_error());
	return $r;
}

function get_numero_fattura(){
	$sql = "SELECT COUNT(DISTINCT numero) FROM fatture;";
	$r = mysql_query($sql);
	$c = mysql_fetch_array($r) or die (mysql_error());
	$c = $c[0];
	return $c;
}

function genera_fattura($id){
	$anno = date( "Y",time());
	$mese = date("m",time());
	$data = date("Y-m-d");
	$numero = get_numero_fattura()+1;
	
	$sql = "SELECT DISTINCT numero, cliente, data FROM ddt WHERE data LIKE '".$anno."-".$mese."%' AND cliente = $id";
	$ddt = mysql_query($sql) or die (mysql_error());
	
	//echo $sql;
	
	while($row = mysql_fetch_array($ddt)){
		$n_ddt = $row["numero"];
		$sql = "INSERT INTO fatture (cliente,numero,data,ddt) VALUES ($id,$numero,'$data','$n_ddt')";
		//echo $sql;
		$fattura = mysql_query($sql) or die (mysql_error());
	}
}

function get_fattura($n,$cliente){
	$sql = "SELECT * FROM fatture WHERE numero = $n AND cliente = $cliente";
	$r = mysql_query($sql) or die (mysql_error());
	return $r;
}

function get_fatture_mese($mese){
	$anno = date( "Y",time());
	
	$sql = "SELECT DISTINCT numero, cliente, data FROM fatture WHERE data LIKE '".$anno."-".$mese."%'";
	$r = mysql_query($sql) or die (mysql_error());
	return $r;
}

?>