<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Books Eshop</title>

        <!-- Bootstrap -->
        <link href="<?= $this->app->getBaseUrl(); ?>web/css/bootstrap-main-template.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $this->app->getBaseUrl(); ?>web/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $this->app->getBaseUrl(); ?>web/css/slider.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $this->app->getBaseUrl(); ?>web/css/searchResult.css" rel="stylesheet" type="text/css"/>
        <link href="<?= $this->app->getBaseUrl(); ?>web/css/site.css" rel="stylesheet" type="text/css"/>
        <script src="<?= $this->app->getBaseUrl(); ?>web/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="<?= $this->app->getBaseUrl(); ?>web/js/Slider.js" type="text/javascript"></script>

    </head>
    <body class="body">
        <div class="navbar-wrapper">
            <ul>
                <?php
                if(!isset($_SESSION['logged']))
                {
                echo'<li>
                        <a href="' . $this->app->getBaseUrl() . 'user/register#showRedirect">Sign in</a>
                    </li>
                    <li>
                        <a href="' . $this->app->getBaseUrl() . 'user/login#showRedirect">Log In</a>
                    </li>';
                }
                else
                {
                    echo '<li>
                            <strong>' . User::GetUserName($_SESSION['logged']) . '</strong>
                        </li>
                        <li>
                            <a href="' . $this->app->getBaseUrl() . 'user/logout#showRedirect">Log Out</a>
                        </li>';
                }
                ?>
                <li>
                    <a href="<?= $this->app->getBaseUrl(); ?>basket/basket#showRedirect">Basket</a>
                </li>

            </ul>
            <!-- HTML for SEARCH BAR -->
            <div id="tfheader" class="tfheader">
                <form id="tfnewsearch" method="post" action="<?= $this->app->getBaseUrl(); ?>book/search">
                    <input type="text" class="tftextinput" placeholder="Search for book..." name="book_search" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
                </form>
                <div class="tfclear"></div>
            </div>

        </div>

        <a href="<?= $this->app->getBaseUrl(); ?>">
            <img src="<?= $this->app->getBaseUrl(); ?>images/book-shop2.jpg" id="header-image" />
        </a>
                
        <a name="showRedirect"></a>
        
        <div id="menu">
            <ul id="menu-bar">
                <li>
                    <a href="<?= $this->app->getBaseUrl(); ?>site/about#showRedirect">About</a>
                </li>
                <li> 
                    <a href="#">Books</a>
                    <ul>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>book/allbooks#showRedirect">All</a>
                        </li>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>book/categories#showRedirect" >Categories</a>
                        </li>
                    </ul>
                <li><a href="#">Discounts</a>
                    <ul>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>search/allbooks">All</a>
                        </li>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>search/allbooks">Categories</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= $this->app->getBaseUrl(); ?>search/allbooks">My books</a>
                </li>
                <li>
                    <a href="<?= $this->app->getBaseUrl(); ?>search/allbooks">Contact</a>
                </li>

            </ul>
        </div>
               
        <div class="container" id="content">
            <div class="row">
                <?= $content; ?>
            </div>
        </div>
        
        <div class="container" id="categoryContent">
            <div class="row">
                <?= isset($categoryContent) ? $categoryContent : ''; ?>
            </div>
        </div>
        <footer>Copyright © 2015 Copyright Katarina Brinzikova, Martin Devecka, Jan Sekerak</footer>
        
        <script type="text/javascript">
            var slider = new Bs.Slider();
            slider.slide();
        </script>

    </body>
</html>
