<!DOCTYPE html>
<html lang="en">
  <head>
	<?php 
		require_once("script/db_connection.php");
		require_once("script/function.php");

		$c = db_connect();
		
		require_once("meta.php");  
	?>
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">CLOUDCoders</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
            <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <?php require_once("sidebar.php"); ?>
      	
        <div class="span9">
          <div class="page-header">
		    <h1>Nuovo DDT</h1>
		  </div>
          <div class="row-fluid">
          	<div class="span8">
          		<form class="form-horizontal" action="javascript:void(0);" novalidate>
          			<fieldset>
	          	  		<div class="control-group">
				            <label class="control-label" for="select01">Seleziona Cliente</label>
				            <div class="controls">
				              <select id="cliente">
				              	<option value="-">-</option>
				              <?php
				              	$clienti = get_all_clienti();
								while($row = mysql_fetch_array($clienti)){
									echo '<option value="'.$row["id"].'">';
									echo ''.$row["ragione_sociale"];
									echo '</option>';
								}
				              ?>
				              </select>
				            </div>
			          	</div>
			          </fieldset>
				</form>
          	</div>
          </div>
          <div id="ddt">
	          <div class="page-header">
			    <h1>Inserici voci</h1>
			  </div>
	          <div class="row-fluid">
	          	<div class="span6">
		          	<form class="form-inline" action="javascript:void(0);" novalidate>
		          	  	<input type="text" name="quantita" id="quantita" class="input-small" placeholder="Quantita">
					  	<input type="text" name="codice" id="codice" class="input-small" placeholder="Codice">
					  	<button class="btn btn-primary" id="inserisci">Inserisci</button>
					</form>
				</div>
				
				<div class="span6">
					<form class="form-inline pull-right" action="javascript:void(0);" novalidate>
						<button type="submit" class="btn btn-inverse pull-right" id="indietro">
							<i class="icon-arrow-left icon-white"></i>  Indietro
						</button>
					</form>
					
				</div>
				
	          </div>
	          
				<div class="row-fluid" id="error">
					<div class="alert alert-error">
						<a class="close" data-dismiss="alert">×</a>
						  Error
					</div>
				</div>
	          <div class="row-fluid">
	          	<div id="tabella" class="span12">
					<table id="prodotti" class="table table-striped table-bordered table-condensed">
						<!-- testata tabella -->
						<thead>
							<th>Codice</th>
							<th>Quantita</th>
							<th>Prezzo</th>	
						</thead>
						
						<!-- corpo tabella -->
						<tbody>
							
						</tbody>
					</table>				
	          	</div>
	          	<div class="row-fluid">
		          	<form class="form-inline pull-right" action="javascript:void(0);" novalidate>
						<button type="submit" class="btn btn-danger pull-right" id="annulla">
							<i class="icon-remove icon-white"></i>  Annulla
						</button>
						<button type="submit" class="btn btn-success pull-right" id="salva">
							<i class="icon-ok icon-white"></i>  Salva
						</button>
					</form>
				</div>
				
	          	<div class="row-fluid" id="success">
					
				</div>
				
	          </div>
	         
	        </div><!--/span-->
	      </div><!--/row-->
		</div>
      <hr>

      <footer>
        <p>&copy; CLOUDCoders 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
    	$(document).ready(function () {
    		$("#success").hide();
    		$("#error").hide();
    		$("#ddt").hide();
    	
    		$("#inserisci").click(function () {
    			quantita = $("#quantita").val();
    			codice = $("#codice").val();
    			$("#prodotti tbody").prepend("<tr><td>"+codice+"</td><td>"+quantita+"</td><td>"+quantita*codice+"</td></tr>");
    			$("#quantita").focus();
    		});
    		
    		$("#cliente").change(function() {
    			$("#ddt").show("fast");
    		});
    		
    		$("#quantita").focus(function(){ // onfocus
		       $(this).val(''); // clear value
		       $("#codice").val('');
		    });
			    
    		$("#salva").click(function () {
    			tabella = $("#tabella").html();
    			id_cliente = $("#cliente").val();
    			$.ajax({
			      type: "POST",
			      url: "script/inserisci_ddt.php",
			      data: "tabella=" + tabella + "&id_cliente=" + id_cliente,
			      dataType: "html",
			      success: function(msg)
			      {
			        $("#success").show();
			        $("#success").html('<a href="ddt.php?n='+msg+'" class="btn">Stampa DDT</a>');
			      },
			      error: function()
			      {
			        $("#error").show();
			      }
			    });
    		});
    		
    		$("#annulla").click(function() {
    			$("#prodotti tr :not(th)").remove();
    		});
    		
    		$("#indietro").click(function() {
    			$("#prodotti tr:eq(1)").remove();
    		});
    		
    	});
    </script>
  </body>
</html>
<?php mysql_close($c); ?>