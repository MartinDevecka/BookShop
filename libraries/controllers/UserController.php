<?php

class UserController extends Controller {

    public function actionRegister() {

        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;      
        $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
        
        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Register form';
        
        if (!empty($_POST)) {
            if (!empty($name) && !empty($password) && !empty($email) && !empty($phone)) {
                if (Helpers::isValidEmail($email)) {                  
                    $datapost['success'] = User::insertUser($_POST);
                } else {
                    $datapost['error'] = 'Non valid format.';
                }
            } else {
                $datapost['error'] = 'All  items has to be filled.';
            }
        }
        $this->render('userRegisterForm', $datapost, 'register');
    }
    
    public function actionLogin() {

        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
                     
        $datapost['error'] = '';
        $datapost['success'] = '';
        $datapost['title'] = 'Login';
        
        if (!empty($_POST)) {
            if (!empty($email) && !empty($password)) {
                if (Helpers::isValidEmail($email)) {                  
                    if (User::verifyUser($_POST)){
                        $_SESSION['logged'] = 1;   
                        $datapost['success'] = 'Login successful.';
                    }               
                } else {
                    $datapost['error'] = 'Non valid format.';
                }
            } else {
                $datapost['error'] = 'All  items has to be filled.';
            }
        }
        $this->render('userLoginForm', $datapost, 'register');
    }    
}
