<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?=$this->app->getBaseUrl();?>/web/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$this->app->getBaseUrl();?>/web/css/site.css" rel="stylesheet">
    <script type="text/javascript" src="<?=$this->app->getBaseUrl();?>/web/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=$this->app->getBaseUrl();?>/web/js/custom.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>  
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">car-specs.com</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                
                <li>
                    <a href="<?=$this->app->getBaseUrl();?>search/cars" title="#">
                      Cars
                    </a>
                </li>
                <li>
                    <a href="<?=$this->app->getBaseUrl();?>search/industry">
                      Industry
                    </a>
                </li>
                <li>
                    <a href="<?=$this->app->getBaseUrl();?>search/other">
                      Other
                    </a>
                </li>
                <li>
                    <a href="<?=$this->app->getBaseUrl();?>api/index">
                      API
                    </a>
                </li>
                <li>
                    <a href="<?=$this->app->getBaseUrl();?>customer/register">
                      Sign Up
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Premium Bootstrap Themes &amp; Templates"><i class="fa fa-star text-yellow"></i> Login </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
   <header class="sb-page-header">
  <div class="container">
    <h1>Free and open vehicle specifications</h1>
    <p> Blablabla </p>
    
</div>

  </div>
</header>

<div class="container">
  <div class="row">
    <?=$content;?>
  </div>
</div>
    

   
    <script src="<?=$this->app->getBaseUrl();?>/wb/js/bootstrap.min.js"></script>
  </body>
</html>