<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Books Eshop</title>

        <!-- Bootstrap -->
        <link href="<?= $this->app->getBaseUrl(); ?>web/css/bootstrap-main-template.css" rel="stylesheet">
        <title></title>
    </head>
         <body class="body">
        <div class="navbar-wrapper">
            <ul>
                <li>
                    <a href="<?= $this->app->getBaseUrl(); ?>user/login">
                                Sign in
                            </a>
                </li>
                <li>
                     <a href="<?= $this->app->getBaseUrl(); ?>user/login">
                                Log In
                            </a>
                </li>
                <li>
                    <a href="<?= $this->app->getBaseUrl(); ?>search/basket">
                                Basket
                            </a>
                </li>
             
            </ul>
            <!-- HTML for SEARCH BAR -->
            <div id="tfheader" class="tfheader">
                <form id="tfnewsearch" method="post" action="_blank">
                    <input type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
                </form>
                <div class="tfclear"></div>
            </div>
            
        </div>
        
        <div class="bookshop-second-bg">
        </div>    
     
        <div>
            <ul id="menu-bar">
                <li>
                    <a href="<?= $this->app->getBaseUrl(); ?>search/allbooks">
                               About
                            </a>
                </li>
                      <li> 
                          <a href="#">
                                Books
                            </a>
                    <ul>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>search/allbooks">
                                All
                            </a>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>search/allbooks">
                               Categories
                            </a></li>
                    </ul>
                <li><a href="#">Discounts</a>
                    <ul>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>search/allbooks">
                                All
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->app->getBaseUrl(); ?>search/allbooks">
                                Categories
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= $this->app->getBaseUrl(); ?>search/allbooks">
                               My books
                            </a>
                </li>
                <li>
                    <a href="<?= $this->app->getBaseUrl(); ?>search/allbooks">
                               Contact
                            </a>
                </li>
                
            </ul>
        </div>
        
        
    </body>
</html>
