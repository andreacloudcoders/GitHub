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
		    <h1>Elenco Clienti</h1>
		  </div>
		    <div class="row-fluid" id="success">
				<div class="alert alert-success">
					<a class="close" data-dismiss="alert">×</a>
					  Succes
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
				<table id="clienti" class="table table-striped table-bordered table-condensed">
					<!-- testata tabella -->
					<thead>
						<th width="40%">Ragione Sociale</th>
						<th width="40%">P.Iva</th>
						<th width="20%">Elimina</th>	
					</thead>
					
					<!-- corpo tabella -->
					<tbody>
					<?php
						$clienti = get_all_clienti();
						while($row = mysql_fetch_array($clienti)){
							echo '<tr>';
							echo '	<td>'.$row["ragione_sociale"].'</td>';
							echo '	<td>'.$row["p_iva"].'</td>';
							echo '	<td>
										<span class="label label-important" id="'.$row["id"].'">
											<i class="icon-trash icon-white"></i> Elimina
										</span>
								    </td>';
							echo '</tr>';
						}
					?>
					</tbody>
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
    		$("#success").hide();
    		$("#error").hide();
    	
    		$("td > span").click(function() {
    			id = $(this).attr("id");
    			if(confirm("Confermi l'eliminazione del record selezionato?")){
    				$(window.location).attr('href', 'script/elimina_cliente.php?id='+id);					
				}
    		});
       	});
    </script>
  </body>
</html>
<?php mysql_close($c); ?>