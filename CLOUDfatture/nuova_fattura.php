<!DOCTYPE html>
<html lang="en">
  <head>
	<?php 
    	require_once("meta.php");
    	require_once("script/db_connection.php");
    	require_once("script/function.php");
    	
    	$c = db_connect();
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
		    <h1>Nuova Fattura</h1>
		  </div>
		  
			<div class="row-fluid" id="error">
				<div class="alert alert-error">
					<a class="close" data-dismiss="alert">×</a>
					  Error
				</div>
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
			          	<div class="form-actions">
			            	<button type="submit" class="btn btn-primary" id="genera">Genera Fattura</button>
			            	<button class="btn">Cancel</button>
			          	</div>
			          </fieldset>
				</form>
          	</div>
          	
          </div>
          <div class="row-fluid" id="success">
          	
			</div>
         
        </div><!--/span-->
      </div><!--/row-->
      
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
    		$('button[type="submit"]').attr('disabled', true);
    		
    		$("#cliente").change(function(){
    			$('button[type="submit"]').removeAttr("disabled");
    		});
    	
    		$("#genera").click(function() {
    			id = $("#cliente").attr("value");
    			$.ajax({
			      type: "POST",
			      url: "script/genera_fattura.php",
			      data: "id=" + id,
			      dataType: "html",
			      success: function(msg)
			      {
			      	//$("#success").html(msg);
			      	$("#success").show();
			      	$("#success").html('<a href="fattura.php?n='+msg+'" class="btn">Stampa Fattura</a>');
			      },
			      error: function()
			      {
			        $("#error").html(msg);
			      }
			    });
    		});
    	});
    </script>
  </body>
</html>