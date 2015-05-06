<?php

class SearchController extends Controller {

    public function actionCars() {
        $this->render('cars');
    }

    public function actionIndustry() {
        $this->render('industry');

        Customer::insert('aaaaa', 'heslooo');
    }

    public function actionOther() {
        $this->render('other');
    }
}

?>
