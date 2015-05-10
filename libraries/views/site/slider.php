<!-- SLIDER -->
<div class="center-block" id="slide-holder">
    <div class=slide-runner" >
        <div id="slide-images-wrap">
            <div id="slide-images">
                <img class="slide-image" alt="sliderBackground1" src="<?= $this->app->getBaseUrl(); ?>images/bookShelfFantasy.jpg" width="1200" />
                <div class="slide-books slide-books1">
                    <?php
                        echo Slider::Get4RandomBooksByCategoryId($this->app, 1);
                    ?>
                </div>
                <img class="slide-image" alt="sliderBackground2" src="<?= $this->app->getBaseUrl(); ?>images/bookshelfSciFi.jpg" width="1200"/>
                <div class="slide-books slide-books2">
                    <?php
                        echo Slider::Get4RandomBooksByCategoryId($this->app, 2);
                    ?>
                </div>
                <img class="slide-image" alt="sliderBackground3" src="<?= $this->app->getBaseUrl(); ?>images/bookshelfNovels.jpg" width="1200"/>
                <div class="slide-books slide-books3">
                    <?php
                        echo Slider::Get4RandomBooksByCategoryId($this->app, 3);
                    ?>
                </div>
                <img class="slide-image" alt="sliderBackground4" src="<?= $this->app->getBaseUrl(); ?>images/bookshelfBestsellers.jpg" width="1200"/>
                <div class="slide-books slide-books4">
                    <?php
                        echo Slider::Get4RandomBooksByCategoryId($this->app, 4);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="slide-controls">
        <span class="glyphicon glyphicon-menu-up" id="slide-up"></span>
        <span class="glyphicon glyphicon-refresh gly-spin" id="slide-refresh"></span>
        <span class="glyphicon glyphicon-menu-down" id="slide-down"></span>
    </div>
</div>