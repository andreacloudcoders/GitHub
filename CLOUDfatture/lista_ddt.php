<!DOCTYPE html>
<html lang="en">
  <head>
   <?php 
   	require_once("meta.php");
   	$mesi = array(
   			'Gennaio',
			'Febbraio',
			'Marzo',
			'Aprile',
			'Maggio',
			'Giugno',
			'Luglio',
			'Agosto',
			'Settembre',
			'Ottobre',
			'Novembre',
			'Dicembre'
			);
   
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
		    <h1>Visualizza DDT</h1>
			  </div>
	          <div class="row-fluid">
	          	<div class="span8">
	          		<form class="form-horizontal" action="javascript:void(0);" novalidate>
	          			<fieldset>
		          	  		<div class="control-group">
					            <label class="control-label" for="select01">Seleziona Mese</label>
					            <div class="controls">
					                <select name="mesi" id="mesi">
									<?php for($i=0;$i<9;$i++){?>
									     	<option value="0<?php echo $i+1?>"><?php echo $mesi[$i]?></option>
									<?php } ?>   
									<?php for($i=9;$i<12;$i++){?>
									     	<option value="<?php echo $i+1?>"><?php echo $mesi[$i]?></option>
									<?php } ?>   
									</select>
					            </div>
				          	</div>
				          </fieldset>
					</form>
	          	</div>
	          </div>
          <div class="page-header">
		    <h1>Elenco DDT Mese</h1>
		  </div>
          <div class="row-fluid">
          	<div id="tabella" class="span12">
				<table id="ddt" class="table table-striped table-bordered table-condensed">
					<!-- testata tabella -->
					<thead>
						<th>#</th>
						<th>Cliente</th>
						<th>Data</th>
						<th>Vedi</th>	
					</thead>
					
					<!-- corpo tabella -->
					<tbody></tbody>
				</table>				
          	</div>
          </div><!--/row-->
      </div><!--/span-->

      

      

    </div><!--/.fluid-container-->
    <hr>
    <footer>
        <p>&copy; CLOUDCoders 2012</p>
    </footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
    	$(document).ready(function () {
    		$("#tabella").hide();
    	
    		
    		$("#mesi").change(function() {
    			mese = $(this).val();
    			$.ajax({
			      type: "POST",
			      url: "script/get_ddt.php",
			      data: "mese=" + mese,
			      dataType: "html",
			      success: function(msg)
			      {
			        $("#ddt > tbody").html(msg);
			      },
			      error: function()
			      {
			        $("#error").show();
			      }
			    });
    			$("#tabella").show();
    		});
    	});
    </script>
  </body>
</html>