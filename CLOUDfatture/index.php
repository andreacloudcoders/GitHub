<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("meta.php");?> 
    <style type="text/css">
      /* Override some defaults */

      body {
        padding-top: 40px;
      }
      .container {
        width: 300px;
      }
 
      /* The white background content wrapper */
      .container > .content {
        margin-left: -20px;
        margin-bottom: 0;
        margin-right: -20px;
        margin-top: 30px;
        background-color: #eee;
        padding: 20px;
        -webkit-border-radius: 10px 10px 10px 10px;
           -moz-border-radius: 10px 10px 10px 10px;
                border-radius: 10px 10px 10px 10px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }
 
      .login-form {
        margin-left: 65px;
      }
 
      legend {
        margin-right: -50px;
        font-weight: bold;
        color: #404040;
      }
 
    </style>
 
</head>   
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
              <li class="active"><a href="home.php">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
            <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="script/login.php?action=login" method="post">
                        <fieldset>
                            <div class="clearfix">
                                <input type="text" placeholder="Username" name="user">
                            </div>
                            <div class="clearfix">
                                <input type="password" placeholder="Password" name="password">
                            </div>
                            <button class="btn btn-primary" type="submit">Sign in</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>
    </div> <!-- /container -->

     
      


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