<?php

session_start();

class SiteController extends Controller {

    public function actionIndex() {
        $this->render('slider');
    }
    
    public function actionAbout()
    {
        $this->render('about');
    }
}

?>