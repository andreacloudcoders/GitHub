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
	$r = get_cliente($id);
	while($row = mysql_fetch_array($r)){
?>
		<fieldset>
		  <legend>Compila i campi</legend>
		  <div class="control-group">
		    <label class="control-label" for="rs">Ragione Sociale</label>
		    <div class="controls">
		      <input type="text" class="input-xlarge" name="rs" value="<?php echo $row["ragione_sociale"]; ?>">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="piva">P. Iva</label>
		    <div class="controls">
		      <input type="text" class="input-xlarge" name="piva" value="<?php echo $row["p_iva"]; ?>">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="citta">Citt&agrave;</label>
		    <div class="controls">
		      <input type="text" class="input-xlarge" name="citta" value="<?php echo $row["citta"]; ?>">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="cap">C.A.P.</label>
		    <div class="controls">
		      <input type="text" class="input-xlarge" name="cap" value="<?php echo $row["cap"]; ?>">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="indirizzo">Indirizzo</label>
		    <div class="controls">
		      <input type="text" class="input-xlarge" name="indirizzo" value="<?php echo $row["indirizzo"]; ?>">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="prov">Provincia</label>
		    <div class="controls">
		      <input type="text" class="input-xlarge" name="prov" value="<?php echo $row["provincia"]; ?>">
		    </div>
		  </div>
		  <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
		  <div class="form-actions">
		    <button type="submit" class="btn btn-primary">Salva</button>
		    <button class="btn">Cancel</button>
		  </div>
		</fieldset>
<?php
	}
}else{
	?>
		<p>Cliente non presente</p>
	<?php
}

mysql_close($c);
?>