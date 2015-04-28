<?php

class CustomerController extends Controller {

    public function actionRegister() {
        
        print_r($_POST);
              
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        if (!empty($email) && !empty($password)) {
            if (Helpers::isValidEmail($email)){
                Customer::insert($_POST);
            } else {
                echo 'Email or password in non valid format.';
            }         
        } else {
            echo 'Email or password is missing.';
        }           

        $this->render('customerForm');
    }

}
