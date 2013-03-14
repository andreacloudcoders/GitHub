<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("meta.php");?>
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
					              <select id="select01">
					                <option>something</option>
					                <option>2</option>
					                <option>3</option>
					                <option>4</option>
					                <option>5</option>
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
						<th>Nome</th>
						<th>Quantita'</th>
						<th>Prezzo (&euro;)</th>	
					</thead>
					
					<!-- corpo tabella -->
					<tbody>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
						</tr>
						<tr>
							<td>1</td>
							<td>2</td>
							<td>3</td>
						</tr>
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
       	});
    </script>
  </body>
</html>