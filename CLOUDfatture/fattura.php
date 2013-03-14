<?php
	$n = $_GET["n"];
	$cliente = $_GET["c"];
	require_once("script/db_connection.php");
	require_once("script/function.php");

	$c = db_connect();
	
	$fattura = get_fattura($n,$cliente);
	$cliente = get_cliente($cliente);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<style type="text/css" media="print">
			@page {
				size: 297mm 210mm; 
				margin: 30mm;
			}
			table {
				page-break-inside: avoid;
			}
			table#footer{
				position: absolute;
				bottom: 50px;
			}
			body{
				height: 100% !important;
			}
			noprint {display: none;}
		</style>
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
			}
			body{
				font-size: 12px;
				font-family: Arial;
				text-align: center;
				width: 210mm;
				padding: 10px;
				height: 297mm !important;
			}
			div#container{
				height: 100%;
				position: relative;
				text-align: center;
			}
			p {
				margin: 0;
				padding: 0;
			}
			td {
				padding: 5px;
			}
			table {
				width: 90%;
				margin: 10px auto;
				font-size: 12px;
			}
			h1{
				font-size: 18px;
			}
			h6{
				text-align: left;
				margin: 0;
				padding: 0;
				font-size: 8px;
				font-style: normal;
				font-weight: lighter;
			}
			th{
				height: 15px;
				vertical-align: middle;
				font-size: 12px;
			}
			/* fine parte comune */
			td#logo{
				border-right: 1px solid gray;
				border-top: 1px solid gray;	
				text-align: center;
			}
			td#logo h1{
				font-family: Times;
				font-size: 18px;
			}
			td#logo p{
				font-size: 10px;
			}	
			td#titolo{
				text-align: left;
				vertical-align: text-top;
				border-top: 1px solid gray;
				width: 50%;
			}
			td#titolo p{
				font-size: 10px;
			}
			td#titolo p#numero{
				margin: 10px 20px 10px 0px;
				font-size: 18px;
				font-style: italic;
				font-weight: bold;
			}
			span.data{
				margin-left: 50px;
				font-size: 12px;
				font-style: italic;
				font-weight: 100;
			}
			td#destinatario{
				border-right: 1px solid gray;
				border-top: 1px solid gray;
				text-align: center;
			}
			td#destinatario h1{
				font-size: 18px;
			}
			td#luogo {
				border-top: 1px solid gray;
				margin-top: 0;
				padding-top: 0;
			}
			td#causale{
				border-top: 1px solid gray;
				border-right: 1px solid gray;
				border-bottom: 1px solid gray;
				height: 30px;
				margin-top: 0;
				padding-top: 0;
			}
			td#ordine{
				border-top: 1px solid gray;
				border-bottom: 1px solid gray;
				text-align: left;
				margin-top: 0;
				padding-top: 0;
			}
			span{
				margin-left: 150px;
			}
			table#elenco td{
				border-bottom: 1px solid gray;
				
			}
			table#elenco th{
				border-bottom: 1px solid gray;
				
			}
			table#footer td{
				height: 30px;
				border-bottom: 1px solid gray;
				padding: 0;
			}
			table#footer th{
				border-bottom: 1px solid gray;
				
			}
			table#footer{
				position: absolute;
				bottom: 100px;
				left: 40px;
			}
			@media print {
				.noprint {display: none;}
			}
			</style>
		<title></title>
	</head>
	<body>
	<button onclick="self.print()" class="noprint">STAMPA</button>
	<div id="container">
		<table cellspacing="0" cellpadding="0" border="0">
			<tr>
				<td id="logo">
					<h1>B&D</h1>
					<p>s.n.c. di Antonio D'Agostino & Tiziano Gagnor</p>
					<p>TORNERIA AUTOMATICA</p>
					<p>Tel. e Fax 011/9342655</p>
					<p>Via Don Marco Cravotto, 13</p>
					<p>10051 DRUBIAGLIO - AVIGLIANA (Torino)</p>
					<p>Partita IVA 02952350011</p>
					<p>R.D. n. 647821 - Reg. Trib. 2489/84</p> 
				</td>
				<td id="titolo">
					<h1>DOCUMENTO DI TRASPORTO (D.d.t.)</h1>
					<p>D.PR. 472 del 14.08.1996 - D.PR. 696 del 21.12.1996</p>
					<p id="numero">N. <?php echo $n; ?>  <span class="data">Data <?php echo date("d/m/Y"); ?></span> </p>
					<p>a mezzo: </p>
				</td>
			</tr>
			<tr>
				<td id="destinatario">
				<?php
					$row = mysql_fetch_array($cliente);
				?>
					<h1><?php echo $row["ragione_sociale"]; ?></h1>
					<p><?php echo $row["indirizzo"]; ?></p>
					<p><?php echo $row["citta"]; ?>, <?php echo $row["cap"]; ?></p>
				</td>
				<td id="luogo">
					<h6>LUOGO</h6><br />
					<p>________________________________________________</p><br/>
					<p>________________________________________________</p>
				</td>
			</tr>
			<tfoot>
				<tr>
					<td id="causale">
						<h6>CAUSALE</h6><br />
						<p>________________________________________________</p>
					</td>
					<td id="ordine">
						<h6>VS. ORDINE N. <span>DATA</span></h6>
						<br />
						<p>_______________________ <span style="margin-left:50px;"> ___/___/_______</span></p>
					</td>
				</tr>
			</tfoot>
		</table>
		<table cellspacing="0" cellpadding="0" border="0" id="elenco">
			<thead>
				<th width="10%" style="border-right:1px solid black;">QUANTIT&Agrave;</th>
				<th colspan="5" width="80%">DESCRIZIONI DEI BENI (natura e qualit&agrave;)</th>
				<th width="10%" style="border-left:1px solid black;">IMPORTO</th>
			</thead>
			<tbody>
			<?php
				$tot = 0;
				while($ddt = mysql_fetch_array($fattura)){
			?>
				<tr>
					<td width="10%" style="border-right:1px solid black;"></td>
					<td colspan="5" width="80%">DDT n.<?php echo $ddt["ddt"];?> del <?php echo $ddt["data"];?></td>
					<td width="10%" style="border-left:1px solid black;"></td>
				</tr>
			<?php
					$dettaglio = get_ddt($ddt["ddt"]);
					while($row = mysql_fetch_array($dettaglio)){
			?>
				<tr>
					<td width="10%" style="border-right:1px solid black;"><?php echo $row["quantita"];?></td>
					<td colspan="5" width="80%"><?php echo $row["codice"];?>  <?php echo $row["descrizione"];?></td>
					<td width="10%" style="border-left:1px solid black;"><?php echo $row["prezzo"];?></td>
				</tr>
			<?php
					}
				$tot = $tot + $row["prezzo"];
				}
			?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2" width="30%">
						<h6>ASPETTO</h6>
					</td>
					<td width="15%">
						<h6>N.COLLI</h6>
					</td>
					<td width="15%">
						<h6>PESO</h6>
					</td>
					<td width="20%">
						<h6>PORTO</h6>
					</td>
					<td style="text-align:right;" width="15%">TOTALE &euro;</td>
					<td style="border: 2px solid black;"><?php echo $tot; ?></td>
				</tr>
			</tfoot>
		</table>
		<table cellspacing="0" cellpadding="0" border="0" id="footer">
			<thead>
				<th width="40%">VETTORE: ditta, domicilio o residenza</th>
				<th width="30%" colspan="2">DATA E ORA DEL RITIRO</th>
				<th width="30%">FIRME</th>
			</thead>
			<tbody>
				<tr>
					<td style="border-right:1px solid black;"></td>
					<td style="border-right:1px solid black;" width="25%"></td>
					<td style="border-right:1px solid black;" width="10%"></td>
					<td></td>
				</tr>
				<tr>
					<td style="border-right:1px solid black;"></td>
					<td style="border-right:1px solid black;"></td>
					<td style="border-right:1px solid black;"></td>
					<td></td>
				</tr>
				<tr>
					<td style="border-right:1px solid black;"></td>
					<td style="border-right:1px solid black;"></td>
					<td style="border-right:1px solid black;"></td>
					<td></td>
				</tr>
				<tr>
					<td style="border-right:1px solid black;font-size:8px;">Consegna o inizio trasporto a mezzo [] cedente [] cessionario</td>
					<td style="border-right:1px solid black;"><h6>DATA</h6><BR /></td>
					<td style="border-right:1px solid black;"><h6>ORA</h6><BR /></td>
					<td><h6>FIRMA DEL CONDUCENTE</h6><BR /></td>
				</tr>
				<tr>
					<td style="border-right:1px solid black;" colspan="2"><h6>ANNOTAZIONI - VARIAZIONI</h6><BR /></td>
					<td style="border-right:1px solid black;"><h6>NUM. PR.</h6><BR /></td>
					<td><h6>FIRMA DEL CESSIONARIO</h6><BR /></td>
				</tr>
			</tbody>
		</table>
	</div>
	</body>
</html>
