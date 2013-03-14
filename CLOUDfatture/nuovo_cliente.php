<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
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
		    <h1>Inserisci Nuovo Cliente</h1>
		  </div>
          <div class="row-fluid">
          	<form class="form-horizontal" action="script/inserisci_cliente.php" method="post">
		        <fieldset>
		          <legend>Compila i campi</legend>
		          <div class="control-group">
		            <label class="control-label" for="rs">Ragione Sociale</label>
		            <div class="controls">
		              <input type="text" class="input-xlarge" name="rs">
		            </div>
		          </div>
		          <div class="control-group">
		            <label class="control-label" for="piva">P. Iva</label>
		            <div class="controls">
		              <input type="text" class="input-xlarge" name="piva">
		            </div>
		          </div>
		          <div class="control-group">
		            <label class="control-label" for="citta">Citt&agrave;</label>
		            <div class="controls">
		              <input type="text" class="input-xlarge" name="citta">
		            </div>
		          </div>
		          <div class="control-group">
		            <label class="control-label" for="cap">C.A.P.</label>
		            <div class="controls">
		              <input type="text" class="input-xlarge" name="cap">
		            </div>
		          </div>
		          <div class="control-group">
		            <label class="control-label" for="indirizzo">Indirizzo</label>
		            <div class="controls">
		              <input type="text" class="input-xlarge" name="indirizzo">
		            </div>
		          </div>
		          <div class="control-group">
		            <label class="control-label" for="prov">Provincia</label>
		            <div class="controls">
		              <input type="text" class="input-xlarge" name="prov">
		            </div>
		          </div>
		          <div class="form-actions">
		            <button type="submit" class="btn btn-primary">Salva</button>
		            <button class="btn">Cancel</button>
		          </div>
		        </fieldset>
		      </form>
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
       	});
    </script>
  </body>
</html>
