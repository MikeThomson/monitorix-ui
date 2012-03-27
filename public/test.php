
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    
		<div class="control-group">
      		<label class="control-label" for="input01">Text input</label>
      		<div class="controls">
        		<select>
        			<option>Project 1</option>
        			<option>Project 2</option>
        			<option>Project 3</option>
        		</select>
        		<p class="help-block">Supporting help text</p>
      		</div>
      		<div class="control-gorup">
      			<label class="control-label" for="input01">Priority: </label>
      			<div class="controls">
      				<label class="checkbox inline"><input type="checkbox">Critical</label>
      				<label class="checkbox inline"><input type="checkbox">Warning</label>
      				<label class="checkbox inline"><input type="checkbox">Info</label>
      			</div>
      		</div>
    	</div>
    
      <div class="errorRow">
      <table class="table">
      <tr data-toggle="collapse" data-target="#c1"><td>Not again!!</td><td>Stuff REALLY Broke. Like, more fucked than a $1500 / hour hooker in congress.<td></td>
      <tr data-toggle="collapse" data-target="#c2"><td>It broke!!</td><td>Stuff REALLY Broke. Like, more fucked than a $1500 / hour hooker lost in the woods.</tr>
      <tr><td>Shit!!</td><td>Stuff REALLY Broke. Like, more fucked than a $1500 / hour hooker on Wall Street.</tr>
      <tr><td>It broke!!</td><td>Stuff REALLY Broke. Like, more fucked than a $1500 / hour hooker in congress.</tr>
      <tr><td>It broke!!</td><td>Stuff REALLY Broke. Like, more fucked than a $1500 / hour hooker in congress.</tr>
      </table>
      </div>
      
      <div class="collapse" id="c1">
      <table class="table">
      <tr><td>This is a test</td></tr>
      <tr><td>Why were you looking for a hookert</td></tr>
      <tr><td>Looking for action?t</td></tr>
      <tr><td>This is a test</td></tr>
      </table>
      </div>
      
      <div class="collapse" id="c2">
      <table class="table">
      <tr><td>This is a test</td></tr>
      <tr><td>Why were you looking for a hookert</td></tr>
      <tr><td>Looking for action?t</td></tr>
      <tr><td>This is a test</td></tr>
      </table>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

  </body>
</html>
