<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("meta.php");?>
<script src="js/charts/highcharts.js" type="text/javascript"></script>

 
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
          <div id="chart" style="width: 100%; height: 400px"></div>
          <div id="chart2" style="width: 100%; height: 400px"></div>
          <div id="chart3" style="width: 100%; height: 400px"></div>
          <div class="row-fluid">
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
          <div class="row-fluid">
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		var chart1; // globally available
		$(document).ready(function() {
		      chart1 = new Highcharts.Chart({
		         chart: {
		            renderTo: 'chart',
		            type: 'bar'
		         },
		         title: {
		            text: 'Fruit Consumption'
		         },
		         xAxis: {
		            categories: ['Apples', 'Bananas', 'Oranges']
		         },
		         yAxis: {
		            title: {
		               text: 'Fruit eaten'
		            }
		         },
		         series: [{
		            name: 'Jane',
		            data: [1, 0, 4]
		         }, {
		            name: 'John',
		            data: [5, 7, 3]
		         }]
		      });
		      
		      chart2 = new Highcharts.Chart({
		         chart: {
		            renderTo: 'chart2',
		         },
		         title: {
		            text: 'Fruit Consumption'
		         },
		         xAxis: {
		            categories: ['Apples', 'Bananas', 'Oranges']
		         },
		         yAxis: {
		            title: {
		               text: 'Fruit eaten'
		            }
		         },
		         series: [{
		            name: 'Jane',
		            data: [1, 0, 4]
		         }, {
		            name: 'John',
		            data: [5, 7, 3]
		         }]
		      });
		      
		      chart3 = new Highcharts.Chart({
		         chart: {
		            renderTo: 'chart3',
		            type: 'pie'
		         },
		         title: {
		            text: 'Fruit Consumption'
		         },
		         xAxis: {
		            categories: ['Apples', 'Bananas', 'Oranges']
		         },
		         yAxis: {
		            title: {
		               text: 'Fruit eaten'
		            }
		         },
		         series: [{

	                type: 'pie',
	
	                name: 'Browser share',
	
	                data: [
	
	                    ['Firefox',   45.0],
	
	                    ['IE',       26.8],
	
	                    {
	
	                        name: 'Chrome',
	
	                        y: 12.8,
	
	                        sliced: true,
	
	                        selected: true
	
	                    },
	
	                    ['Safari',    8.5],
	
	                    ['Opera',     6.2],
	
	                    ['Others',   0.7]
	
	                ]
	
	            }]
		      });
		   });
	
       </script>
  </body>
</html>