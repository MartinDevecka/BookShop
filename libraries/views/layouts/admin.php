<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="<?= $this->app->getBaseUrl(); ?>web/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= $this->app->getBaseUrl(); ?>web/css/site.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?= $this->app->getBaseUrl(); ?>web/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= $this->app->getBaseUrl(); ?>web/js/custom.js"></script>

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
                <!--<div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= $this->app->getBaseUrl(); ?>">onlinelibrary.com</a>
                </div>-->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav">                                  
                        <li class="dropdown open">
                            <a class="dropdown-toggle" aria-expanded="false" data-toggle="dropdown">Book<b class="caret"></b></a>                          
                            <ul class="dropdown-menu dropdown-menu-arrow" role="menu">
                                <li><a href="<?= $this->app->getBaseUrl(); ?>admin/addbook">Add</a></li>
                                <li><a href="<?= $this->app->getBaseUrl(); ?>admin/findbook">Edit/Delete</a></li>                                  
                            </ul>
                        </li>                          
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>search/offers">
                                Category
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>search/contact">
                                User
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>search/basket">
                                Review
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>search/basket">
                                Order
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>search/basket">
                                OrderDetail
                            </a>
                        </li>          
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>user/logoutadmin">
                                Log Out
                            </a>
                        </li>                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <div class="collapse navbar-collapse navbar-ex1-collapse">                                                 
                            <form class="navbar-form" role="search" method="post" action="<?= $this->app->getBaseUrl(); ?>book/search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for book..." name="book_search" id="srch-term">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>                        
                        </div>                      
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <header class="sb-page-header">
            <div class="container">
                <h1>Admin</h1>                
            </div>      
        </header>

        <div class="container">
            <div class="row">
                <?= $content; ?>
            </div>
        </div> 
        <script src="<?= $this->app->getBaseUrl(); ?>web/js/bootstrap.min.js"></script>
    </body>
</html>

