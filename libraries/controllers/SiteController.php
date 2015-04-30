<?php

class SiteController extends Controller {

    public function actionIndex() {
        // echo "som v indexe";
        $this->render('index');
    }

    public function actionFile2() {
        $this->render('file2');
    }
}

?>